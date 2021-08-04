<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class EmployeeType extends Model
{
    use SoftDeletes;
    protected $fillable=[];
    protected $date='deleted_at';

    public function employees(){
        return $this->hasMany('App\Employee','employee_type_id');
    }

    public function canteenInfos(){
        return $this->belongsToMany('App\EmployeeType','canteen_info_employee_types','employee_type_id','canteen_info_id');
    }
}
