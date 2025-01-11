<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $fillable=['share_id','status', 'description', 'photo_url'];

    public function share(){
        return $this->belongsTo(Share::class);
    }
}
