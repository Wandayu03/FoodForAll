<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Payment;
use App\Models\Share;
use Midtrans\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function showForm()
    {
        return view('payment');
    }

    public function paymentSuccess($transaction_id) {
    // Ambil data pembayaran berdasarkan transaction_id
    $payment = Payment::where('transaction_id', $transaction_id)->first();

        if ($payment) {
            // Jika pembayaran ditemukan, ubah statusnya menjadi success
            $payment->status = 'success';
            $payment->save();

            // Jika aktivitasnya adalah donation, perbarui status donation juga
            if ($payment->activity_type == 'donation') {
                $donation = Donation::find($payment->donation_id);
                if ($donation) {
                    $donation->status = 'completed';
                    $donation->save();
                }
            } else if ($payment->activity_type == 'share') {
                $share = Share::find($payment->share_id);
                if ($share) {
                    $share->status = 'process';
                    $share->save();
                } else {
                    Log::error('Share not found for payment ID: ' . $payment->id);
                }
            }

            // Kirim data ke blade untuk ditampilkan
            return view('success', compact('payment'));
        } else {
            // Jika pembayaran tidak ditemukan
            return redirect()->route('payment.failure');
        }
    }


    public function paymentNotification(Request $request)
    {
        $request->validate([
            'transaction_status' => 'required',
            'order_id' => 'required',
        ]);
        
        try {
            $notification = new Notification();

            $transactionStatus = $notification->transaction_status;
            $orderId = $notification->order_id;

            Log::info("Transaction Status: " . $transactionStatus); 
            Log::info("Order ID: " . $orderId);

            $payment = Payment::where('transaction_id', $orderId)->first();

            if ($payment) {
                if (in_array($transactionStatus, ['capture', 'settlement', 'success'])) {
                    $payment->status = 'success';
                    Log::info("Payment status updated to success");
                    
                    if ($payment->activity_type == 'donation') {
                        $donation = Donation::find($payment->donation_id);
                        $donation->status = 'completed';
                        $donation->save();
                        Log::info("Donation status updated to completed");
                    }

                    if ($payment->activity_type == 'share') {
                        $share = Share::find($payment->share_id);
                        $share->status = 'process';
                        $share->save();
                        Log::info("Share status updated to process");
                    }


                } elseif (in_array($transactionStatus, ['pending'])) {
                    $payment->status = 'pending';
                    Log::info("Payment status updated to pending");

                } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
                    $payment->status = 'failed';
                    Log::info("Payment status updated to failed");
                    
                    if ($payment->activity_type == 'donation') {
                        $donation = Donation::find($payment->donation_id);
                        $donation->status = 'failed';
                        $donation->save();
                        Log::info("Donation status updated to failed");
                    }

                    if ($payment->activity_type == 'share') {
                        $share = Share::find($payment->share_id);
                        $share->status = 'failed';
                        $share->save();
                        Log::info("Share status updated to failed");
                    }
                }

                $payment->save();
                Log::info("Payment saved");
            }

            Log::info("Payment notification processed for order: " . $orderId);
            return response()->json(['message' => 'Notification processed successfully'], 200);

        } catch (\Exception $e) {
            Log::error("Payment Notification Error: " . $e->getMessage());
            return response()->json(['message' => 'Failed to process notification'], 500);
        }
    }

    // public function paymentSuccess($transaction_id)
    // {
    //     $payment = Payment::where('transaction_id', $transaction_id)->first();
    //     return view('success', compact('payment'));
    // }
}
