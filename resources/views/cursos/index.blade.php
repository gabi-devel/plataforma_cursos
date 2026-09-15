@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="css/cursos.css">
@endsection

@section('content')
{{-- <img src="../HSE-Banner1.jpg" style="width: 99vw;"> --}}
<div class="container py-4">
    {{-- <h2 class="text-center">Listado de Cursos</h2> --}}
    <h2 class="text-center mt-4 mb-3">CURSOS</h2><br>
    @if($cursos->isEmpty())
        <p class="text-center">No hay cursos disponibles.</p>
    @else
    <div class="row equal-height">
    @foreach ($cursos as $curso)
        <div class="col-md-4 mb-4 px-5">
            <div class="card"style="
            background-color: #ffffffad;
        ">
                <img src="./{{ $curso->imagen }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <span class="badge rounded-pill text-bg-secondary mb-3 text-end" style="font-size: 1em;"> {{ round($curso->progreso) }} %</span>
                  <h5 class="card-title">{{ $curso->titulo }}</h5>
                  <p class="card-text">{{ $curso->descripcion }}</p>
                  <a href="{{ route('unidades_curso', ['curso_id' => $curso->id]) }}" class="btn btn-primary">Ingresar</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    @endif

    {{-- <h5>Formularios: 
    <a href="{{ route('cursos.create')}}">Crear Curso</a> -
    <a href="{{ route('unidades.create')}}">Crear Unidad</a></h5> 
    <a href="{{ route('ver_multiple_choice', $curso->id) }}" class="btn btn-primary mt-4">Ir al Examen</a> --}}
</div>
<img src="../HSE-Banner2.jpg" style="width: 99vw;    height: 40px;">
@endsection