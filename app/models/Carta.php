<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    protected $table="cartas";
    protected $fillable=["nombre", "numero"];

}
