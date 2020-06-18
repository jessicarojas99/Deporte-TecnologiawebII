<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tournament extends Model
{
    protected $fillable=['name','startdate','finishdate'];
    protected $table='tournaments'; 
    protected $primaryKey='id';   
    public function scopeName($query,$name)
    {
        if(trim($name)!="")
        {
            $query->where(DB::raw("CONCAT(name)"),"LIKE","%$name%");
        }
    }
}

