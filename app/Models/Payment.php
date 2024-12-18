<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function share()
    {
        return $this->belongsTo(Share::class);
    }

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}
