<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SubCategoryAddition extends Model
{
    use SoftDeletes;
    protected $fillable=[];
    protected $date='deleted_at';

    public function subCategory(){
        return $this->belongsTo('App\SubCategory');
    }

    public function addition(){
        return $this->belongsTo('App\Addition');
    }
}
