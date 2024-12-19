<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function showForm()
    {
        return view('payment');
    }

    public function createPayment(Request $request)
    {
        // buat ambil konfigurasi Midtrans dari config file
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // simpen data pembayaran di database
        $payment = Payment::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'transaction_id' => uniqid('trx_'), // untuk membuat ID transaksi unik
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey =config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $payment->transaction_id,
                'gross_amount' => $payment->amount,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $payment->snap_token = $snapToken;
        $payment->save();

        $payment->status = 'success';
        $payment->save();
        return view('success', compact('payment'));
    }

    public function success(Payment $payment){
        $payment->status = 'success';
        $payment->save();
        return view('success', compact('payment'));
    }

    public function createSnapToken()
    {
        $url = 'https://api.sandbox.midtrans.com/v2/charge';
        $data = [
            "transaction_details" => [
                "order_id" => "order-id-123",
                "gross_amount" => 10000, // Total jumlah pembayaran
            ],
            "item_details" => [
                [
                    "id" => "item1",
                    "price" => 10000,
                    "quantity" => 1,
                    "name" => "Item Name"
                ]
            ],
            "customer_details" => [
                "first_name" => "John",
                "last_name" => "Doe",
                "email" => "john.doe@example.com",
                "phone" => "08123456789"
            ]
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode('YOUR_SERVER_KEY:')
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        curl_close($ch);

        // // Tambahkan log respons di sini
        // Log::info('Respons dari Midtrans: ', ['response' => $response]);

        // if ($httpCode !== 200) {
        //     return response()->json(['error' => 'Failed to create snap token', 'http_code' => $httpCode], $httpCode);
        // }


        $response = json_decode($response, true);
        if (isset($response['token'])) {
            return response()->json(['snap_token' => $response['token']]);
        } else {
            return response()->json(['error' => 'Failed to create snap token'], 500);
        }
    }

}
