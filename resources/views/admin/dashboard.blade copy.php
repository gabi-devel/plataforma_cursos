@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="text-center mb-4">Empleados</h2>

    <h5>
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Usuario</th>
                  <th scope="col">Progreso</th>
                </tr>
              </thead>
              <tbody>
            @foreach ($usuarios as $u)
                <tr>
                  <th>1</th>
                  <td>{{ $u->name }}</td>
                  <td></td>
                </tr>
            @endforeach
              </tbody>   
        </table>
    </h5>

    
    <h4 class="mt-5">
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrar usuario</a>
        </li> --}}
        <!-- <a href="{{ route('pendientes') }}">Tareas pendientes por hacer</a> -->
    </h4>
</div>

@endsection