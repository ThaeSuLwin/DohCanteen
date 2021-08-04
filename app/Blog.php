<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable=['title','organization_name','description','date','start_time','end_time','image'];
}
