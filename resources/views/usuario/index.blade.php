

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
            <th>Opciones</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Nick usuario</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>
                <a href="{{url('/usuario/'.$usuario->id.'/edit')}}" class="btn btn-success">
                    EDITAR
                </a>
                <form action="{{ url('/usuario/'.$usuario->id) }}" method="post" class="d-inline">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" value="BORRAR" class="btn btn-success">
                </form>

            </td>
            <td>
                <img class="img-fluid img-thumbnail" src="{{asset('storage').'/'.$usuario->foto}}" width="100">
            </td>

            <td>{{$usuario->nombre}}</td>
            <td>{{$usuario->nick}}</td>
            <td>{{$usuario->correo}}</td>

        </tr>
        @endforeach
    </tbody>
</table>
    </div>
    @endsection
