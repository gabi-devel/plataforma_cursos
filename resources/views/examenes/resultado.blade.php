@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Resultado del examen: 
            @if ((($resultado * 100)/$totalPreguntas) >= 60) Aprobado
            @else Desaprobado
            @endif
        </h2>
        <h5>
          <div class="alert alert-info text-center">
              Has respondido correctamente {{ $resultado }} de {{ $totalPreguntas }} preguntas. 
          </div>
        </h5>
        @if ((($resultado * 100)/$totalPreguntas) >= 60) 
        @else 
            <div class="text-center">
                <a href="{{ route('ver_multiple_choice') }}" class="btn btn-primary">Volver a hacer el Examen</a>
            </div>
        @endif

        <a href="{{ url('/') }}">Volver a Cursos</a>
    </div>
@endsection
