<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetailAddition extends Model
{
    protected $fillable=[];

    public function addition()
    {
        return $this->belongsTo('App\Addition');
    }

}
