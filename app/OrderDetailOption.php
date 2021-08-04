<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetailOption extends Model
{
    protected $fillable=[];

    public function option()
    {
        return $this->belongsTo('App\Option');
    }
}
