@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4 class="mb-5">
    Por ahora, la página inicial es este index de cursos. <br>
    <a href="{{ route('pendientes') }}">Más tareas pendientes por hacer</a>
    </h4>

    <h2>Listado de Cursos</h2>
    @if($cursos->isEmpty())
        <p class="text-center">No hay cursos disponibles.</p>
    @else
    <div class="row">
    @foreach ($cursos as $curso)
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="./{{ $curso->imagen }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $curso->titulo }}</h5>
                  <p class="card-text">{{ $curso->descripcion }}</p>
                  <a href="{{ route('unidades_curso', ['curso_id' => $curso->id]) }}" class="btn btn-primary">Ingresar</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    @endif

    <h5>Formularios: 
    <a href="{{ route('cursos.create')}}">Crear Curso</a> -
    <a href="{{ route('unidades.create')}}">Crear Unidad</a></h5>
</div>
@endsection