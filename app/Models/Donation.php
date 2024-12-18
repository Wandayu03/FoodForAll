<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable=['user_id','amount', 'status', 'history_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function history()
    {
        return $this->belongsTo(History::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
