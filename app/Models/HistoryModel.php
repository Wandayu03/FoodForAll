<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
    public function payments()
    {
        return $this->belongsTo(PaymentModel::class);
    }

    public function trackingUpdates()
    {
        return $this->hasMany(Tracking_UpdateModel::class);
    }
}
