<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MainAddition extends Model
{
    use SoftDeletes;
    protected $fillable=[];
    protected $date='deleted_at';
    
}