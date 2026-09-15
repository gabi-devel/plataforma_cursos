@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/unidades.css">
@endsection

@section('content')
<div class="container mt-5">

    <h2 class="text-center mb-4">Curso: {{ $curso->titulo }}</h2>

    <h5>
        @if ($empleados->isEmpty())
            <tr>
                <td colspan="3" class="text-center">No hay empleados inscritos en este curso.</td>
            </tr>
        @else
          <table class="table table-striped">
              <thead>
                  <tr>
                    <th scope="col">Apellido</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Unidades Leidas</th>
                    {{-- <th scope="col">Unidad leida</th> --}}
                    <th scope="col">Examen</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->datos->apellido ?? '' }}</td>
                            <td>{{ $empleado->datos->nombre ?? '' }}</td>
                            <td>{{ $empleado->name }}</td>
                            <td>{{ $empleado->datos->cargo ?? '' }}</td>
                            <td>{{ $empleado->porcentajeAvance }}%</td>
                            {{-- <td>{{ $empleado->pivot->unidad_leida }}</td> --}}
                            <td>{{ $empleado->examenEstado }}</td>
                        </tr>
                    @endforeach
                </tbody>   
          </table>
        @endif
        <br><br>
        
    </h5>
    <a href="{{ route('admin.dashboard') }}">Volver a cursos</a>
</div>

        
@endsection


