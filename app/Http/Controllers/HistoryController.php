<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function getHistory($id, $type){
        $query = History::with(['donations', 'shares', 'user'])->where('user_id', $id);

        if ($type != "all") {
            $query->where('activity_type', $type);
        }
    
        $histories = $query->get();
    
        return view('history', ['userId' => $id, 'histories' => $histories]);

    }
}
