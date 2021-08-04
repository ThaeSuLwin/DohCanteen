<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Addition extends Model
{
    use SoftDeletes;
    protected $fillable =[];
    protected $date='deleted_at';

    public function mainAddition(){
        return $this->belongsTo('App\MainAddition');
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }
}
