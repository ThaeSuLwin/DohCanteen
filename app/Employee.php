<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Employee extends Model
{
    use SoftDeletes;
    protected $fillable=[];
    protected $date='deleted_at';
    
    public function employeeType(){
        return $this->belongsTo('App\EmployeeType','employee_type_id');
    }
    public function gender(){
        return $this->belongsTo('App\Gender','gender_id');
    }
    public function canteenInfo(){
        return $this->belongsTo('App\CanteenInfo','canteen_info_id');
    }
}
