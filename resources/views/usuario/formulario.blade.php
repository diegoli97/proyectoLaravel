<!--Mismo formulario para insertar y editar usuario-->
<h1>{{$modo}} usuario</h1>
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="{{isset($usuario->nombre)?$usuario->nombre:''}}"
           id="nombre"  class="form-control">
</div>

<div class="form-group">
<label for="nick">Nick de usuario</label>
<input type="text" class="form-control" name="nick"
       value="{{isset($usuario->nick)?$usuario->nick:''}}" id="nick">
</div>

<div class="form-group">
<label for="correo">Correo electrónico</label>
<input type="text" class="form-control" name="correo"
       value="{{isset($usuario->correo)?$usuario->correo:''}}" id="correo">
</div>

<div class="form-group">
@if(isset($usuario->foto))
<img src="{{asset('storage').'/'.$usuario->foto}}" width="100" alt="">
@endif
<label for="foto">Foto de perfil</label>
<input class="form-control" type="file" name="foto" value="" id="foto"><br>
</div>

<input class="btn btn-success" type="submit" value="{{$modo}} usuario">

<a class="btn btn-success" href="{{url('usuario/')}}">Volver a la lista de usuarios</a>
