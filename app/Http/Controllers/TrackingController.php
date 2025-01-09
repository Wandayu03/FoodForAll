<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Share;
use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function getTracking($id){

        $trackings = Tracking::where('share_id', $id)->get(); 
        $share = Share::find($id);

        return view('tracking', compact('trackings', 'share', 'payment'));
    }
}
