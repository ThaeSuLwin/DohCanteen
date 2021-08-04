<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[];

    public function subCategory(){
        return $this->belongsTo('App\SubCategory');
    }

    public function orderDetailOptions()
    {
        return $this->hasMany('App\OrderDetailOption');
    }

    public function orderDetailAdditions()
    {
        return $this->hasMany('App\OrderDetailAddition');
    }
    public function orderDetailOthers()
    {
        return $this->hasMany('App\OrderDetailOther');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function canteenInfo()
    {
        return $this->belongsTo('App\CanteenInfo');
    }
}
