<?php

    use App\gps;
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
    Route::get("/app", function () {
        return "aaa";
    })->middleware('auth:api');

    Route::get("/numero", function () {
        return Response::json(["numero" => rand(1, 11)]);
    });
    Route::get("/persona", function () {
        return Response::json(
            ["nombre" =>"Juan",
            "edad" =>"18",
            "Sexo" =>"M",
            "descripcion" =>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
ci         "

            ]

        );
    });


    Route::post("/enviar/numero", function (Request $R) {
        $n = $R->get("numero");
        $nombre = $R->get("nombre");
        $c = Carta::create(["numero" => $n, "nombre" => $nombre]);
        return Response::json(["carta" => $c]);
    });
    Route::get("/obtener/click", function (Request $R) {
        return Response::json(["resultados" => Carta::groupBy('nombre')
            ->selectRaw('nombre,count(*) as total')
            ->get()]);
    });
    Route::get("/obtener/numero", function (Request $R) {
        return Response::json(["resultados" => Carta::all()]);
    });
    Route::get("/borrar/numero", function (Request $R) {
        Carta::where("id", ">=", 0)->delete();
        return Response::json(["resultados" => "Se limipo"]);
    });
    Route::post("/guardargps", function (Request $request) {
        $gp = gps::create([
            "nombre" => $request->get("nombre"),
            "latitud" => $request->get("latitud"),
            "longitud" => $request->get("longitud")
        ]);
        return Response::json(["data" => $gp]);
    });
    Route::get("/recuperargps", function (Request $request) {
        $gp = gps::all();
        return Response::json(["data" => $gp]);
    });


    Route::get("/cartaloteria", function (Request $request) {

        return Response::json(["numero" => rand(1, 54)]);
    })->middleware('auth:api');;
