@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Examen de la Unidad</h2>

        <form action="{{ route('guardar_respuestas', 1) }}" method="POST">
            @csrf
            @foreach($preguntas as $pregunta)
                <div class="mb-4">
                    <h5>{{ $pregunta->pregunta }}</h5>
                    @foreach($pregunta->opcionesMultipleChoice as $opcion)
                        <div class="form-check">
                            <input type="radio" name="pregunta_{{ $pregunta->id }}" value="{{ $opcion->id }}" class="form-check-input">
                            <label class="form-check-label">{{ $opcion->texto_opcion }}</label>
                        </div>
                    @endforeach
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
