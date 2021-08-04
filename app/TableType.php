<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TableType extends Model
{
    use SoftDeletes;
    protected $fillable=[];
    protected $date='deleted_at';

    public function canteenInfos(){
        return $this->belongsToMany('App\CanteenInfo','canteen_info_table_types','table_type_id','canteen_info_id');
    }
}
