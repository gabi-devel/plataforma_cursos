@extends('layouts.app')

@section('estilos')
  <link rel="stylesheet" href="../../../css/styles.css">
  <link rel="stylesheet" href="../../../css/unidades.css">
@endsection

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Resultado del examen: 
            <div class="alert alert-success text-center mt-4">
                <strong>¡Tu examen está Aprobado!</strong>
            </div>
        </h2>

        <a href="{{ url('/') }}">Volver a los Cursos</a>
    </div>
@endsection
