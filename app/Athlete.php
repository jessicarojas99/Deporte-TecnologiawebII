<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Athlete extends Model
{
    protected $fillable=['name','lastname','ci','gender','height','weight','birthdate','sport_id','team_id'];
    protected $table='athletes'; 
    protected $primaryKey='id';

    public function scopeName($query,$name)
    {
        if(trim($name)!="")
        {
            $query->where(DB::raw("CONCAT(name,'',lastname)"),"LIKE","%$name%");
        }
    }
}
