<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable=['activity_type', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shares(){
        return $this->hasOne(Share::class, 'history_id');
    }

    public function donations(){
        return $this->hasOne(Donation::class, 'history_id');
    }

}
