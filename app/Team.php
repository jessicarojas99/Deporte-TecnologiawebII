<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Team extends Model
{
    protected $fillable=['name','city'];
    protected $table='teams'; 
    protected $primaryKey='id'; 
 

    public function scopeName($query,$name)
    {
        if($name)
        {
            return $query->where('name','like',"%$name%");
        }
    }
    public function scopeCity($query,$city)
    {
        if($city)
        {
            return $query->where('city','like',"%$city%");
        }
    }
}
