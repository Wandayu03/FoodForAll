<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\History;
use App\Models\Share;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class ShareController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'event_name' => 'required|string|max:255',
            'food_type' => 'required|string|max:255',
            'estimated_people' => 'required|integer',
            'amount' => 'required|numeric|min:1000',
            'distribution_date' => 'required|date',
            'distribution_address' => 'required|string|max:255',
        ]);

        $history = History::create([
            'user_id' => Auth::id(),
            'activity_type' => "share"
        ]);

        $share = Share::create([
            'event_name' => $request->input('event_name'),
            'food_type' => $request->input('food_type'),
            'estimated_people' => $request->input('estimated_people'),
            'budget' => $request->input('amount'),
            'distribution_date' => $request->input('distribution_date'),
            'distribution_address' => $request->input('distribution_address'),
            'user_id' => Auth::id(),
            'status' => 'pending',
            'history_id' => $history->id
        ]);

        Tracking::create([
            'share_id' => $share->id,
            'status' => 'Donation accepted'
        ]);

        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $transactionDetails = [
            'order_id' => uniqid('share_'),
            'gross_amount' => $share->budget,
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

            // Simpan data pembayaran di database
            Payment::create([
                'user_id' => Auth::id(),
                'share_id' => $share->id,
                'transaction_id' => $transactionDetails['order_id'],
                'activity_type' => 'share',
                'amount' => $share->budget,
                'status' => 'pending',
            ]);

            // Redirect ke halaman pembayaran dengan token dari Midtrans
            return view('payment', compact('snapToken', 'share'));

        } catch (\Exception $e) {
            // Tangani jika terjadi error
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    //
}