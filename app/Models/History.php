<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    public function payments()
    {
        return $this->belongsTo(Payment::class);
    }

    public function trackingUpdates()
    {
        return $this->hasMany(Tracking::class);
    }
}
