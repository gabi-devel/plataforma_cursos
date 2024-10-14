@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <h2 class="col-md-6 mx-auto mb-5 text-center">Formulario para Cursos</h2>
            <form action="{{ route('cursos.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control shadow-none" 
                        value="{{ old('titulo') }}">
                        {{-- @error('titulo')
                            <small class="text-danger" role="alert">
                                {{ $message }}
                            </small>
                        @enderror --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control shadow-none" 
                        value="{{ old('descripcion') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="text" name="imagen" id="imagen" class="form-control shadow-none" 
                        value="hxh.png">{{-- value="{{ old('imagen') }}" --}}
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection