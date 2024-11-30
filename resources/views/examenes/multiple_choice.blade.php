@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Examen</h2><br>
        <div class="container">
            <form action="{{ route('guardar_respuestas', 1) }}" method="POST">
                @csrf
                @foreach($preguntas as $pregunta)
                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header mt-2">
                                <h5>{{ $pregunta->pregunta }}</h5>
                            </div>
                            @foreach($pregunta->opcionesMultipleChoice as $opcion)
                                <div class="form-check my-2 mx-2">
                                    <input type="radio" name="pregunta_{{ $pregunta->id }}" value="{{ $opcion->id }}" class="form-check-input">
                                    <label class="form-check-label">{{ $opcion->texto_opcion }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
@endsection
