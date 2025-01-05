<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Donation;
use App\Models\History;
use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;

class DonationController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'amount' => 'required|numeric|min:10000',
        ]);

        $history = History::create([
            'user_id' => Auth::id(),
            'activity_type' => "donation"
        ]);

        $donation = Donation::create([
            'user_id' => Auth::id(),
            'amount' => $request->input('amount'),
            'history_id' => $history->id,
            'status' => 'pending'
        ]);

        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Detail Transaksi
        $transactionDetails = [
            'order_id' => uniqid('donation_'),
            'gross_amount' => $donation->amount,
        ];

        // Detail Pelanggan
        $customerDetails = [
            'first_name' => Auth::user()->name,
            'email' => Auth::user()->email,
        ];

        // Parameter untuk Midtrans
        $midtransParams = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
        ];

        
        try {
            // Dapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($midtransParams);

            Log::info("Snap Token: " . $snapToken);

            // Simpan data pembayaran di database
            $payment = Payment::create([
                'user_id' => Auth::id(),
                'donation_id' => $donation->id,
                'transaction_id' => $transactionDetails['order_id'],
                'activity_type' => 'donation',
                'amount' => $donation->amount,
                'status' => 'pending',
                'snap_token' => $snapToken
            ]);

            Log::info("Payment created with snap token: " . $payment->snap_token);
            // Redirect ke halaman pembayaran dengan token dari Midtrans
            return view('payment', compact('snapToken', 'donation', 'payment'));

        } catch (\Exception $e) {
            // Tangani jika terjadi error
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
