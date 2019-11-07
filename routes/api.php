<?php
    
    use App\models\Carta;
    use Illuminate\Http\Request;
    
    
    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
    */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/app",function(){
    return "aaa";
})->middleware('auth:api');


Route::get("/numero",function(){
    Return Response::json(["numero"=>rand(1,11)]);
});
Route::get("/enviar/numero",function(Request $R){
    $n=$R->get("numero");
    $nombre=$R->get("nombre");
    $c= Carta::create(["numero"=>$n,"nombre"=>$nombre]);
    Return Response::json(["carta"=>$c]);
});
