<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Athlete extends Model
{
    protected $fillable=['name','lastname','ci','gender','height','weight','birthdate','sport_id','team_id'];
    protected $table='athletes'; 
    protected $primaryKey='id';

    public function scopeAthlete($query,$tipo,$buscar)
    {
        if(($tipo) && ($buscar))
        {
            return $query->where($tipo,'like',"%$buscar%");
        }
    }
}
