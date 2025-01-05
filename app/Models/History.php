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
        return $this->belongsTo(Share::class);
    }

    public function donations(){
        return $this->belongsTo(Donation::class);
    }

}
