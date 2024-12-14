<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracking_UpdateModel extends Model
{
    public function history()
    {
        return $this->belongsTo(History::class);
    }
}
