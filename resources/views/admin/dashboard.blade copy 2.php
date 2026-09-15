@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="text-center mb-4">Profesores</h2>

    <h5>
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">Apellido</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Cursos</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($cursos as $curso)
                  <tr>
                    <td>{{ $curso->datos->apellido ?? '-' }}</td>{{-- <td>{{ $curso->datos->apellido ?? 'Sin apellido' }}</td> --}}
                    <td>{{ $curso->datos->nombre ?? '-' }}</td>{{-- <td>{{ $curso->datos->nombre ?? 'Sin nombre' }}</td> --}}
                    <td>{{-- Link de cantidad de cursos, para ir a una vista donde se muestre los cursos que enseña --}}</td>
                  </tr>
              @endforeach
              </tbody>   
        </table>
    </h5>

    <a href="{{ route('admincurso') }}">Ver los cursos</a>
    
    <h4 class="mt-5">
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrar usuario</a>
        </li> --}}
        {{-- <a href="{{ route('pendientes') }}">Tareas pendientes por hacer</a> --}}
    </h4>
</div>

@endsection