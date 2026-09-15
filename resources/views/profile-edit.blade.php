@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Editar Perfil</h2>
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <div class="form-group mb-2">
            <label for="name">DNI</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required disabled>
        </div>

        <div class="form-group">
            <label for="password">Nueva Contraseña</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
    </form>
</div>
@endsection
