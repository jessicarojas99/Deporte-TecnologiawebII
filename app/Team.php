<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Team extends Model
{
    protected $fillable=['name','city'];
    protected $table='teams'; 
    protected $primaryKey='id'; 
 
    //forma que se busca el deporte
    public function getRouteKeyName()
    {
        return 'id';
    }
    public function scopeName($query,$name)
     {
         if(trim($name)!="")
         {
             $query->where(DB::raw("CONCAT(name)"),"LIKE","%$name%");
         }
     }
}
