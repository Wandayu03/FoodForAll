<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function store(Request $request)
    {
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
        
        return redirect()->intended('/');

        // Integrasi dengan Midtrans atau redirect ke halaman pembayaran
        // return redirect()->route('payment.process', ['donate' => $donation->id]);
    }
}
