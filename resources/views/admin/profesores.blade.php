@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="text-center mb-4">Profesores</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Apellido</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cursos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profesores as $profesor)
                <tr>
                    <td>{{ $profesor->usuario->datos->apellido ?? 'Sin apellido' }}</td>
                    <td>{{ $profesor->usuario->datos->nombre ?? 'Sin nombre' }}</td>
                    <td>
                        <a href="{{ route('profesor.cursos', $profesor->id) }}">
                            {{ $profesor->cursos->count() }} Cursos
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="mt-5">
        <a class="nav-link" href="{{ route('register') }}">Registrar usuario</a>
    </h4>

<a href="{{ route('admin.dashboard') }}">Volver</a>

</div>



@endsection