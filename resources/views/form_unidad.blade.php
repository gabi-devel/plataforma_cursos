@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <h2 class="col-md-6 mx-auto mb-5 text-center">Formulario para Unidades</h2>
            <form action="{{ route('unidades.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="curso" class="form-label">Curso</label>
                        <select name="curso_id" id="curso_id" class="form-control shadow-none">
                            <option value="" disabled selected>Seleccione un curso</option>
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}">{{-- {{ old('curso_id') == $curso->id ? 'selected' : '' }} --}}
                                    {{ $curso->titulo }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control shadow-none" 
                        value="{{ old('titulo') }}">
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control shadow-none" 
                        value="{{ old('descripcion') }}">
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="contenido" class="form-label">Contenido</label>
                        <input type="text" name="contenido" id="contenido" class="form-control shadow-none" 
                        value="{{ old('contenido') }}">
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="video" class="form-label">Video</label>
                        <input type="text" name="video" id="video" class="form-control shadow-none" 
                        value="{{ old('video') }}">
                    </div>
                </div> --}}
                <div class="col-md-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection