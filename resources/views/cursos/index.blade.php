@extends('layouts.app')

@section('content')
<div class="container">
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
                  <a href="#" class="btn btn-primary">Go go go</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    @endif
</div>
@endsection