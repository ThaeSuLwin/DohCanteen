<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use SoftDeletes;
    protected $fillable=[];
    protected $date='deleted_at';

    public function canteenInfo(){
        return $this->belongsTo('App\CanteenInfo');
    }
}
