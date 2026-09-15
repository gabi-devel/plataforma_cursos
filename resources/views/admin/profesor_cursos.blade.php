@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="../../../css/styles.css">
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Cursos de {{ $profesor->usuario->datos->nombre ?? 'Profesor' }}</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Descripción</th>    
            </tr>
        </thead>
        <tbody>
            @foreach ($profesor->cursos as $curso)
                <tr>
                    <td>{{ $curso->titulo }}</td>
                    <td>{{ $curso->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

<a href="{{ route('profesores.index') }}">Volver</a>

</div>


@endsection
