<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $fillable=['event_name', 'food_type', 'estimated_people', 'budget', 'distribution_date', 'distribution_address', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}