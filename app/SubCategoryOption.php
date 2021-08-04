<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SubCategoryOption extends Model
{
    use SoftDeletes;
    protected $fillable=[];
    protected $date='deleted_at';

    public function subCategory(){
        return $this->belongsTo('App\SubCategory');
    }

    public function option(){
        return $this->belongsTo('App\Option');
    }
}
