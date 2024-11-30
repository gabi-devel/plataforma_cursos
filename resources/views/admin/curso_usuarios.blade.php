@extends('layouts.app')

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
                    <th scope="col">Empleados</th>
                    <th scope="col">Unidades Leidas</th>
                    {{-- <th scope="col">Unidad leida</th> --}}
                    <th scope="col">Examen</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->name }}</td>
                            <td>{{ $empleado->porcentajeAvance }}%</td>
                            {{-- <td>{{ $empleado->pivot->unidad_leida }}</td> --}}
                            <td>{{ $empleado->examenEstado }}</td>
                        </tr>
                    @endforeach
                </tbody>   
          </table>
        @endif
        <br><br>
        <a href="{{ route('admin.dashboard') }}">Volver</a>
    </h5>

</div>

        
@endsection


