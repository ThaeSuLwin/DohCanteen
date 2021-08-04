<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Item extends Model
{
    use SoftDeletes;
    protected $fillable=[];
    protected $date='deleted_at';

    public function category(){
        return $this->belongsTo('App\Category');
    }
    
    public function options(){
        return $this->belongsToMany('App\Option','sub_category_options','sub_category_id','option_id');
    }
    public function additions(){
        return $this->belongsToMany('App\Addition','sub_category_additions','sub_category_id','addition_id');
    }
}
