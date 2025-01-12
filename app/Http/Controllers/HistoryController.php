<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{   

    public function showForm()
    {
        return view('payment');
    }
    public function getHistory($type){
        $id = Auth::user()->id;
        $query = History::where('user_id', $id);

        $currentFilter = $type;
        
        if ($type != "all") {
            $query->where('activity_type', $type);
        }
    
        $histories = $query->orderBy('created_at', 'desc')->paginate(5); 
    
        return view('history', ['histories' => $histories, 'currentFilter' => $currentFilter]);

    }

    public function getAll($type){
        $query = History::query();

        $currentFilter = $type;

        if ($type != "all") {
            $query->where('activity_type', $type);
        }
    
        $histories = $query->orderBy('created_at', 'desc')->paginate(5); 
    
        return view('history', ['histories' => $histories, 'currentFilter' => $currentFilter]);
    }
}
