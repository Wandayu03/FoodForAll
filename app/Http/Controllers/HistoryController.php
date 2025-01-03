<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function getHistory($type){
        $id = Auth::user()->id;
        $query = History::findOrFail($id);

        if ($type != "all") {
            $query->where('activity_type', $type);
        }
    
        $histories = $query->get();
    
        return view('history', ['userId' => $id, 'histories' => $histories]);

    }
}
