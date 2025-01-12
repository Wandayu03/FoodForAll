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

    // public function paymentSuccess($transaction_id) {
    //     $payment = Payment::where('transaction_id', $transaction_id)->first();
    
    //     if ($payment) {
    //         $this->updatePaymentAndRelatedStatus($payment, 'success');
    //         return view('success', compact('payment'));
    //     } else {
    //         return redirect()->route('payment.failure');
    //     }
    // }
    
    // public function paymentNotification(Request $request)
    // {
    //     $request->validate([
    //         'transaction_status' => 'required',
    //         'order_id' => 'required',
    //     ]);
    
    //     try {
    //         $notification = new Notification();
    
    //         $transactionStatus = $notification->transaction_status;
    //         $orderId = $notification->order_id;
    
    //         Log::info("Transaction Status: " . $transactionStatus); 
    //         Log::info("Order ID: " . $orderId);
    
    //         $payment = Payment::where('transaction_id', $orderId)->first();
    
    //         if ($payment) {
    //             if (in_array($transactionStatus, ['capture', 'settlement', 'success'])) {
    //                 $this->updatePaymentAndRelatedStatus($payment, 'success');
    //                 Log::info("Payment and related status updated to success");
    //             } elseif ($transactionStatus === 'pending') {
    //                 $this->updatePaymentAndRelatedStatus($payment, 'pending');
    //                 Log::info("Payment and related status updated to pending");
    //             } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
    //                 $this->updatePaymentAndRelatedStatus($payment, 'failed');
    //                 Log::info("Payment and related status updated to failed");
    //             }
    //         }
    
    //         return response()->json(['message' => 'Notification processed successfully'], 200);
    //     } catch (\Exception $e) {
    //         Log::error("Payment Notification Error: " . $e->getMessage());
    //         return response()->json(['message' => 'Failed to process notification'], 500);
    //     }
    // }
    

    public function processPayment($type, $id)
{

    $existingPayment = null;

    if($type=="donation"){
        $existingPayment = Payment::where('donation_id', $id)
        ->where('status', 'pending')
        ->first();
    }else{
        $existingPayment = Payment::where('share_id', $id)
        ->where('status', 'pending')
        ->first();
    }

    if ($existingPayment) {
        // Inform the user that a payment is already pending
        Log::info('Existing pending payment found for' . $id);
        // return redirect()->route('history', ['type' => 'donation'])
                        //  ->with('error', 'A payment for this transaction is already pending. Please complete or cancel it before trying again.');
    }

    if ($existingPayment->status == 'pending') {

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;  // Ubah sesuai lingkungan Anda
        Config::$isSanitized = true;
        Config::$is3ds = true;

        

        $uniqueOrderId = 'DONATION-' . $existingPayment->id . '-' . time(); // or use uniqid()

        $transactionDetails = [
            'order_id' => $uniqueOrderId,
            'gross_amount' => $existingPayment->amount,
        ];

        $customerDetails = [
            'first_name' => Auth::user()->name,
            'email' => Auth::user()->email,
        ];

        $snapToken = Snap::getSnapToken([
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
        ]);

        if($type=="donation"){
            $payment = Payment::create([
                'user_id' => Auth::id(),
                'donation_id' => $id,
                'transaction_id' => $transactionDetails['order_id'],
                'activity_type' => 'donation',
                'amount' => $existingPayment->amount,
                'status' => 'pending',
                'snap_token' => $snapToken
            ]);
        }else{
            $payment = Payment::create([
                'user_id' => Auth::id(),
                'share_id' => $id,
                'transaction_id' => $transactionDetails['order_id'],
                'activity_type' => 'donation',
                'amount' => $existingPayment->amount,
                'status' => 'pending',
                'snap_token' => $snapToken
            ]);
        }

        return view('payment', ['snapToken' => $snapToken, 'donation' => $existingPayment, 'payment' => $payment]);
    }

    return redirect()->route('history', ['type' => 'donation'])->with('error', 'Donation payment is not pending.');
}

public function showPaymentDetail($id)
{
    // Ambil detail pembayaran (contoh untuk share atau donation)
    $share = Share::find($id); // atau model lain yang sesuai
    $donation = null; // atau logika pengambilan data lainnya

    // Dapatkan snapToken dari Midtrans (pastikan Anda menggunakan kode yang sesuai untuk kebutuhan)
    $params = [
        'transaction_details' => [
            'order_id' => 'ORDER-' . uniqid(),
            'gross_amount' => $share ? $share->budget : ($donation ? $donation->amount : 0),
        ],
        // Tambahkan parameter lainnya sesuai kebutuhan
    ];

    // Memanggil Midtrans Snap API
    Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    Config::$isProduction = false;
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $snapToken = \Midtrans\Snap::getSnapToken($params);

    return view('payment', compact('share', 'donation', 'snapToken'));
}



    // public function paymentSuccess($transaction_id)
    // {
    //     $payment = Payment::where('transaction_id', $transaction_id)->first();
    //     return view('success', compact('payment'));
    // }
}
