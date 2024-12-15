<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000',
        ]);

        $donation = Donation::create([
            'user_id' => Auth::id(), // Isi dengan ID pengguna yang sedang login
            'amount' => $request->input('amount'),
            'status' => 'pending',
        ]);
        

        // Integrasi dengan Midtrans atau redirect ke halaman pembayaran
        return redirect()->route('payment.process', ['donate' => $donation->id]);
    }
}
