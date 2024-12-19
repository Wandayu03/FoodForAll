<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Donation;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'history_id' => $history->id
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

            // Simpan data pembayaran di database
            Payment::create([
                'user_id' => Auth::id(),
                'donation_id' => $donation->id,
                'transaction_id' => $transactionDetails['order_id'],
                'activity_type' => 'donation',
                'amount' => $donation->amount,
                'status' => 'pending',
            ]);

            // Redirect ke halaman pembayaran dengan token dari Midtrans
            return view('payment', compact('snapToken', 'donation'));

        } catch (\Exception $e) {
            // Tangani jika terjadi error
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function paymentNotification(Request $request)
    {
        try {
            // Inisialisasi Midtrans Notification
            $notification = new \Midtrans\Notification();
    
            // Dapatkan detail notifikasi
            $transactionStatus = $notification->transaction_status;
            $orderId = $notification->order_id;
    
            // Cari pembayaran berdasarkan transaction_id (order_id)
            $payment = Payment::where('transaction_id', $orderId)->first();
    
            if ($payment) {
                // Periksa status transaksi
                if (in_array($transactionStatus, ['capture', 'settlement', 'success'])) {
                    $payment->status = 'success';
                } elseif (in_array($transactionStatus, ['pending'])) {
                    $payment->status = 'pending';
                } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
                    $payment->status = 'failed';
                }
    
                // Simpan perubahan status ke database
                $payment->save();
            }

            // Berikan respons sukses ke Midtrans
            return response()->json(['message' => 'Notification processed successfully'], 200);
    
        } catch (\Exception $e) {
            // Tangani error dan log pesan error
            // \Log::error("Payment Notification Error: " . $e->getMessage());
            // return response()->json(['message' => 'Failed to process notification'], 500);
        }
        
        // // Verifikasi dan proses notifikasi dari Midtrans
        // $status = $request->get('status_code');

        // // Update status pembayaran di database
        // $payment = Payment::where('transaction_id', $request->get('order_id'))->first();
        // $payment->status = ($status == '200') ? 'success' : 'failed';
        // $payment->save();

        // // Redirect ke halaman terima kasih
        // return redirect()->route('thankyou');
    }

}
