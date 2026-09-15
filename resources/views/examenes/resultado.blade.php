@extends('layouts.app')

@section('estilos')
  <link rel="stylesheet" href="../../../../../../css/styles.css">
  <link rel="stylesheet" href="../../../../../../css/unidades.css">
@endsection

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Resultado del examen 
            @if ($porcentaje >= 60)
                <div class="alert alert-success text-center mt-4">
                    Has respondido correctamente el {{ number_format($porcentaje) }}% de las preguntas<br>
                    <strong>¡Aprobaste!</strong>
                </div>
                <!-- Enlace para descargar el certificado -->
                <div class="text-center mt-4">
                    <a href="{{ route('descargar_certificado', $examenId) }}" class="btn btn-success">Descargar Certificado</a>
                </div>
            @else
                <div class="alert alert-danger text-center mt-4">
                    Desaprobado: respondiste correctamente {{ $resultado }} de {{ $totalPreguntas }} preguntas
                </div>
                @if ($intentosFallidos < 1)
                    <div class="alert alert-danger text-center">
                        Recuerda que debe estar correcto el 60% del examen
                    </div>
                    <div>
                        Te queda 1 intento. Puedes releer las unidades y volver a hacer el examen
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('ver_multiple_choice', ['examenId' => $examenId, 'usuario' => $usuario]) }}" class="btn btn-primary">Volver a hacer el examen</a>
                    </div>
                @else
                    <div class="text-center mt-4">
                        <p class="text-danger">Has agotado tus intentos para resolver este examen.</p>
                        <!-- Link para reiniciar el curso -->
                        <form action="{{ route('reiniciar_curso', $examenId) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning mt-3">
                                Volver a realizar el curso
                            </button>
                        </form>
                    </div>
                @endif
            @endif
        </h2>

        <a href="{{ url('/') }}">Volver a los Cursos</a>
    </div>
@endsection
