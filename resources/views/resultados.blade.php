@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white">Torneo mundial de 21</div>
                    <div class="card-body">
                        <table class="table table-striped table-inverse ">
                            <thead class="thead-inverse bg-info text-white">
                            <tr>
                                <th>Nombre</th>
                                <th>Puntos</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartas as $carta)
                                <tr class="table-success">
                                    <td >{{$carta->nombre}}</td>
                                    <td>{{$carta->numero}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
