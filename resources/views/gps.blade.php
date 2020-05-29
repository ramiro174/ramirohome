<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mapa de registros GPS</title>
    <style>
        .gps-container{
            max-height: 200px !important;
            width: 100% !important;
            overflow-x: auto !important;
            white-space: nowrap;
            padding-bottom: 20px;
            margin-top: 5vh;
        }
        .gps-card{
            height: auto !important;
            width: 300px !important;
            display: inline-block;
            background: rgba(47,191,196,.5);
            margin-right: 10px;
            padding: 10px;
            box-sizing: border-box !important;
        }
        .gps-card p{
            margin: 0px;
        }
        #mapa{
            height:60vh;
            width:100%;
            margin-top: 5vh;
        }
    </style>
</head>
<body>

<h1 style="width: 100%; text-align: center">Ubicaciones:</h1>

<div class="gps-container">
    @foreach($data as $item)
        <div class="gps-card">
            <p><span><strong>Nombre: </strong></span><span class="nombre_value">{{$item['nombre']}}</span></p>
            <p><span><strong>Latitud: </strong></span><span class="latitud_value">{{$item['latitud']}}</span></p>
            <p><span><strong>Longitud: </strong></span><span class="longitud_value">{{$item['longitud']}}</span></p>
        </div>
    @endforeach
</div>

<div id="mapa"></div>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $.ajax({
        accept:'application/json',
        url:'/api/recuperargps',
        method:'get',
        data:null,
        cache:false,
        success:function (data) {

            initMap(data);

        },
        error:function (error) {
            alert('Intente más tarde');
        }
    });
    function initMap(Datos) {

        var mapa;

        // opciones del mapa
        var opciones = {
            zoom: 12,
            center : {lat:25.537698,lng:-103.414165}
        }

        // asignando mapa
        mapa = new google.maps.Map(document.getElementById('mapa'),opciones);

        function addMarker(ubicacion){
            var marker = new google.maps.Marker({
                position:{lat:ubicacion.latitud,lng:ubicacion.longitud},
                map:mapa
            });

            var infoWindow = new google.maps.InfoWindow({
                content:'<h2>'+ubicacion.nombre+'</h2>'
            })

            marker.addListener('click',function () {
                infoWindow.open(mapa,marker);
            });
        }

        Datos.data.forEach(ubicacion =>
            {
                ubicacion.latitud = parseFloat(ubicacion.latitud);
                ubicacion.longitud = parseFloat(ubicacion.longitud);
                addMarker(ubicacion);
            }
        );

    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDL184q65HWjgvsebXvT7ISNn8SnVsHZc">

</script>


