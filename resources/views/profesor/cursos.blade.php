@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Mis Cursos</h2>

    @if($cursos->isEmpty())
        <p class="text-center">No tienes cursos asignados.</p>
    @else
        {{-- <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre del Curso</th>
                    <th scope="col">Alumnos</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table> --}}
                {{-- @foreach ($cursos as $curso)
                    <tr>
                        <td>{{ $curso->titulo }}</td>
                        <td>
                            <a href="{{ route('profecurso', $curso->id) }}" class="btn btn-primary btn-sm">Ver</a>
                        </td>
                    </tr>
                @endforeach --}}

                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">Curso</th>
                          <th scope="col">Cantidad de Estudiantes</th>
                          {{-- <th scope="col">Cantidad de Completado</th>  --}}
                          <th scope="col">Cantidad de Aprobados</th>
                          {{-- <th scope="col">Porcentaje</th> --}}
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
                            <a href="{{ route('profe.usuarios', ['cursoId' => $curso->id]) }}">
                              {{ $curso->cantidadEstudiantes }}
                            </a>
                          </td>
                          {{--  <td>{{ $curso->cantidadCompletados }}de {{ $curso->cantidadEstudiantes }}   </td>--}}
                          <td>{{ $curso->cantidadAprobados }}</td>
                          {{-- <td>{{ $porcentaje }} % 
                          </td> --}}
                        </tr>
                    @endforeach
                      </tbody>   
                </table>


    @endif

</div>
@endsection
