<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ds_plan extends Model
{
    //
    protected $table='ds_plan';
    protected $fillable=['planname','item1','quantity1','item2','quantity2','item3','quantity3',];
}
