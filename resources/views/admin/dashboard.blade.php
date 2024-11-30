@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="text-center mb-4">Cursos</h2>

    <h5>
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">Curso</th>
                  <th scope="col">Cantidad de Estudiantes</th>
                  <th scope="col">Cantidad de Completados</th> 
                  <th scope="col">Porcentaje</th>
                </tr>
              </thead>
              <tbody>
            @foreach ($cursos as $curso)
                @php
                  if ($curso->cantidadEstudiantes == 0) { $porcentaje = 0; }
                  else { $porcentaje = ($curso->cantidadCompletados * 100) / $curso->cantidadEstudiantes; }
                @endphp
                <tr>
                  <td>{{ $curso->titulo }}</td>
                  <td>
                    <a href="{{ route('cursos.usuarios', ['cursoId' => $curso->id]) }}">
                      {{ $curso->cantidadEstudiantes }}
                    </a>
                  </td>
                  <td>{{ $curso->cantidadCompletados }} de {{ $curso->cantidadEstudiantes }} 
                  </td>
                  <td>{{ $porcentaje }} % 
                  </td>
                </tr>
            @endforeach
              </tbody>   
        </table>
    </h5>

    
    <h4 class="mt-5">
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrar usuario</a>
        </li> --}}
        {{-- <a href="{{ route('pendientes') }}">Tareas pendientes por hacer</a> --}}
    </h4>
</div>

@endsection