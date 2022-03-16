
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
<form action="{{url('/usuario')}}" method="post" enctype="multipart/form-data">
@csrf
@include('usuario.formulario',['modo'=>'Crear']);

</form>
    </div>
@endsection
</body>
</html>
