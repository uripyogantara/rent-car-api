<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'car_id', 'start_date','end_date', 'status'
    ];

    public function car(){
        return $this->belongsTo('App\Car','car_id');
    }
}
