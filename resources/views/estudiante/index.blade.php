@extends('layouts.app')

@section('content')
<div class="container">


    @if (Session::has ('mensaje'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('mensaje') }}

            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif
    <a href=" {{ url('estudiante/create') }}" class="btn btn-success">Registrar nuevo estudiante </a>
    <br>
    <br>

    <table class="table table-dark">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
            <tr>
                <td>{{ $estudiante->id }}</td>
                <td>
                    <img src=" {{ asset('storage').'/'. $estudiante->foto }}" class="img-thumbnail img-fluid" width="100" alt="">
                </td>



                <td>{{ $estudiante->nombre }}</td>
                <td>{{ $estudiante->apellidoPaterno }}</td>
                <td>{{ $estudiante->apellidoMaterno }}</td>
                <td>{{ $estudiante->correo }}</td>
                <td>
                    <a href=" {{ url('/estudiante/'.$estudiante->id.'/edit') }}" class="btn btn-warning">
                        Editar
                    </a>
                    <form action=" {{ url('/estudiante/'.$estudiante->id) }} " method="post" class="d-inline">
                        @csrf
                        {{ method_field("DELETE") }}
                        <input type="submit" onclick="return confirm('¿Estás seguro? Se eliminará el registro.')" value="Eliminar" class="btn btn-danger">

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $estudiantes->links() !!}
</div>
@endsection
