@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('cursos.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="nombre" class="form-label">Materia</label>
                        <input type="text" name="nombre" id="nombre" class="form-control shadow-none" 
                        value="{{ old('nombre') }}">
                        @error('nombre')
                            <small class="text-danger" role="alert">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control shadow-none" 
                        value="{{ old('descripcion') }}">
                        @error('descripcion')
                            <small class="text-danger" role="alert">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="dia" class="form-label">Día</label>
                        {{-- <select id="sel_dia" class="form-select shadow-none" name="name_dia" 
                        value="{{ old('name_dia') }}">
                            <option value="" selected disabled>Seleccionar...</option>
                            @foreach ($varDias as $tal_dia)
                                <option value="{{ $tal_dia->id_dia }}"
                                    {{ old('name_dia') == $tal_dia->id_dia ? 'selected' : '' }}
                                >
                                    {{ $tal_dia->id_dia }}
                                </option>
                            @endforeach
                        </select>
                        @error('name_dia')
                            <small class="text-danger" role="alert">
                                Seleccione un día
                            </small>
                        @enderror --}}
                        {{-- <select id="dia" class="form-select shadow-none" name="id_dia" 
                        value="{{ old('id_dia') }}">
                            <option value="" selected disabled>Seleccionar...</option>
                            @foreach ($dias as $dia)
                                <option value="{{ $dia->id_dia }}"
                                    {{ old('id_dia') == $dia->id_dia ? 'selected' : '' }}
                                >
                                {{ $dia->dia }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_dia')
                            <small class="text-danger" role="alert">
                                Seleccione un día
                            </small>
                        @enderror --}}
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