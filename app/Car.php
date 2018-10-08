<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function store(){
        return $this->belongsTo('App\Store','store_id');
    }
}
