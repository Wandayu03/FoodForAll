<?php

namespace App\Http\Controllers;

use App\Models\RentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'event_name' => 'required|string|max:255',
            'food_type' => 'required|string|max:255',
            'estimated_people' => 'required|integer',
            'budget' => 'required|numeric',
            'distribution_date' => 'required|date',
            'distribution_address' => 'required|string|max:255',
        ]);

        $rent = RentModel::create([
            'event_name' => $request->input('event_name'),
            'food_type' => $request->input('food_type'),
            'estimated_people' => $request->input('estimated_people'),
            'budget' => $request->input('budget'),
            'distribution_date' => $request->input('distribution_date'),
            'distribution_address' => $request->input('distribution_address'),
            'status' => 'pending', // Status awalnya pending
            'user_id' => Auth::id(), // Menyimpan ID pengguna yang sedang login
        ]);

        return redirect()->route('payment.process', ['rent' => $rent->id]);
    }
}
