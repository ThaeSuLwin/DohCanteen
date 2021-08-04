<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CanteenOwner extends Model
{
    use softDeletes;
    protected $fillable=[];
    protected $date = 'deleted_at';

    public function canteenInfo(){
        return $this->hasMany('App\CanteenInfo');
    }
}
