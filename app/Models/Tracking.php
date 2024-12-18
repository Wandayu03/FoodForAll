<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    public function share(){
        return $this->belongsTo(Share::class);
    }
}
