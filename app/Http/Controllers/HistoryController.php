<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function getHistory($type){
        $id = Auth::user()->id;
        $query = History::where('user_id', $id);

        if ($type == 'share') {
            $query->with('shares');
        } elseif ($type == 'donation') {
            $query->with('donations');
        } else {
            $query->with(['shares', 'donations']);
        }
        
        if ($type != "all") {
            $query->where('activity_type', $type);
        }
    
        $histories = $query->paginate(5); 
    
        return view('history', ['userId' => $id, 'histories' => $histories]);

    }
}
