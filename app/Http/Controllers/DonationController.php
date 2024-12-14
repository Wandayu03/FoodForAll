<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data dari form
        $validated = $request->validate([
            'amount' => 'required|numeric|min:10000',
        ]);

        $amount = $validated['amount'] ?? null;
        if (!$amount) {
            return back()->withErrors(['amount' => 'Please enter an amount of at least Rp 10,000.']);
        }

        $donation = Donation::create([
            'user_id' => Auth::id(), // Isi dengan ID pengguna yang sedang login
            'amount' => $validated['amount'],
            'status' => 'pending',
        ]);
        

        // Integrasi dengan Midtrans atau redirect ke halaman pembayaran
        return redirect()->route('donate')->with('success', 'Thank you for your donation!');
    }
}
