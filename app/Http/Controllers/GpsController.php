<?php

namespace App\Http\Controllers;

use App\gps;
use Illuminate\Http\Request;

class GpsController extends Controller
{
    //
    public function getGpsRegisters()
    {

        $gps = gps::all(['nombre','latitud','longitud']);

        return view('gps',['data'=>$gps]);
    }
}
