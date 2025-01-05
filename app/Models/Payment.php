<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
     // Menentukan atribut yang dapat diisi secara massal
     protected $fillable = [
        'user_id',
        'donation_id',
        'share_id',
        'transaction_id',
        'activity_type',
        'amount',
        'status',
        'snap_token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function share(){
        return $this->belongsTo(Share::class);
    }

    public function donation(){
        return $this->belongsTo(Donation::class);
    }
}
