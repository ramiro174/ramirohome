<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gps extends Model
{
    protected $table="gps";
    protected $fillable=[
         "nombre",
         "latitud",
         "longitud"
     ];
}
