<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Table extends Model
{
    use SoftDeletes;
    protected $fillable=[];
    protected $date='deleted_at';

    public function tableType(){
        return $this->belongsTo('App\TableType');
    }
}
