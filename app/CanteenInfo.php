<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CanteenInfo extends Model
{
    use SoftDeletes;
    protected $fillable =[];
    protected $date='deleted_at';

    public function canteenOwner(){
        return $this->belongsTo('App\CanteenOwner','canteen_owner_id');

    }
    public function tableTypes(){
        return $this->belongsToMany('App\TableType','canteen_info_table_types','canteen_info_id','table_type_id');
    }

    public function employeeTypes(){
        return $this->belongsToMany('App\EmployeeType','canteen_info_employee_types','canteen_info_id','employee_type_id');
    }

    public function employee(){
        return $this->hasMany('App\Employee');
    }

    public function categories(){
        return $this->hasMany('App\Category');
    }
    public function subCategories(){
        return $this->hasMany('App\SubCategory');
    }
}
