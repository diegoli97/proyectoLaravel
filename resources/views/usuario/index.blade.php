
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')

    <div class="container">

@if(Session::has('mensaje'))
    {{Session::get('mensaje')}}
@endif
<br>
<h3>Lista de usuarios</h3>
<a href="{{url('usuario/create')}}" class="btn btn-success">Nuevo usuario</a><br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Nick usuario</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>

            <td>
                <img class="img-fluid img-thumbnail" src="{{asset('storage').'/'.$usuario->foto}}" width="100">
            </td>

            <td>{{$usuario->nombre}}</td>
            <td>{{$usuario->nick}}</td>
            <td>{{$usuario->correo}}</td>
            <td>
                <a href="{{url('/usuario/'.$usuario->id.'/edit')}}" class="btn btn-warning">
                    Editar
                </a>
                <form action="{{ url('/usuario/'.$usuario->id) }}" method="post" class="d-inline">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Seguro de que quieres borrar')"
                           value="Borrar" class="btn btn-danger">
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
    @endsection
</body>
</html>
