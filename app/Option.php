<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Option extends Model
{
    use SoftDeletes;
    protected $fillable=[];
    protected $date='deleted_at';

    public function mainOption(){
        return $this->belongsTo('App\MainOption');
    }

    public function subCategories(){
        return $this->belongsToMany('App\SubCategory','sub_category_options','option_id','sub_category_id');
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }
}
