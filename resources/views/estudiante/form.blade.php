
<h1>{{ $modo }} estudiante </h1>

@if (count($errors) > 0)

<div class="alert alert-danger" role="alert">
 <ul>
    @foreach ($errors->all() as $error)
       <li> {{ $error }}</li>
    @endforeach
    </ul>
</div>

@endif
<form></form>
<div class="form-group">
    <label for="Nombre">Nombre: </label>
    <input type="text" class="form-control" name="nombre" value=" {{ isset($estudiante->nombre)?$estudiante->nombre:old('nombre') }} " id="nombre">

</div>

<div class="form-group">
    <label for="apellidoPaterno"> Apellido paterno: </label>
    <input type="text" class="form-control" name="apellidoPaterno" value=" {{ isset($estudiante->apellidoPaterno)?$estudiante->apellidoPaterno:old('apellidoPaterno') }} " id="apellidoPaterno">

</div>

<div class="form-group">
    <label for="apellidoMaterno"> Apellido materno: </label>
    <input type="text" name="apellidoMaterno" value=" {{ isset($estudiante->apellidoMaterno)?$estudiante->apellidoMaterno:old('apellidoMaterno') }} " id="apellidoMaterno"  class="form-control" >

</div>

<div class="form-group">
    <label for="correo"> Correo: </label>
    <input type="email" class="form-control" name="correo" value=" {{isset($estudiante->correo)?$estudiante->correo:old('correo') }} " id="correo" placeholder="Ingresa tu correo">

</div>

<div class="form-group">
    <label for="foto">Foto: </label>
    @if (isset($estudiante->foto))
    <img src=" {{ asset('storage').'/'. $estudiante->foto }} " width="100"  alt="" class="img-thumbnail img-fluid">
    @endif
    <input type="file" name="foto"  class="form-control-file"  id="foto">
</div>

    <input class="btn btn-success" type="submit" value=" {{ $modo }} estudiante">

    <a class="btn btn-primary" href=" {{ url('estudiante') }} "> Regresar </a>
</form>
