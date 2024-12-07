<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function history()
    {
        return $this->hasOne(HistoryModel::class);
    }
}
