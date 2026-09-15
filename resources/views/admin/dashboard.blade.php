@extends('layouts.app')

@section('content')
<div class="container  text-center mt-5">

    <h2 class="text-center mb-4">Panel de Administrador</h2>
    <br>
    <br>
    <div class="row justify-content-md-center">
        <div class="col col-lg-5">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="align-text-bottom text-start"><a href="#"><h5>Empresas</h5></a></th>
                        <td>
                            <div class="d-flex gap-2 mb-3 justify-content-end">
                                <button type="button" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i>
                                    Agregar
                                </button>
                                <button type="button" class="btn btn-success">
                                    <i class="bi bi-eye"></i>
                                    Ver
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <i class="bi bi-trash3"></i>
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-text-bottom text-start"><a href="{{ route('admincurso') }}"><h5>Cursos</h5></a></th>
                        <td>
                            <div class="d-flex gap-2 mb-3 justify-content-end">
                                <button type="button" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i>
                                    Agregar
                                </button>
                                <a href="{{ route('admincurso') }}" type="button" class="btn btn-success">
                                    <i class="bi bi-eye"></i>
                                    Ver
                                </a>
                                <button type="button" class="btn btn-danger">
                                    <i class="bi bi-trash3"></i>
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-text-bottom text-start"><a href="{{ route('profesores.index') }}"><h5>Profesores</h5></a></th> 
                        <td>
                            <div class="d-flex gap-2 mb-3 justify-content-end">
                                <button type="button" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i>
                                    Agregar
                                </button>
                                <a href="{{ route('profesores.index') }}" type="button" class="btn btn-success">
                                    <i class="bi bi-eye"></i>
                                    Ver
                                </a>
                                <button type="button" class="btn btn-danger">
                                    <i class="bi bi-trash3"></i>
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>   
            </table>
        </div>
    </div>
    
    <h4 class="mt-5">
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrar usuario</a>
        </li> --}}
        {{-- <a href="{{ route('pendientes') }}">Tareas pendientes por hacer</a> --}}
    </h4>
</div>

{{-- <tr>
                    <th scope="row"><a href="{{ route('admincurso') }}">Cursos</a></th>
                    <td>
                        <div class="d-flex gap-2 mb-3">
                            <button type="button" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i>
                            Agregar
                            </button>
                            <button type="button" class="btn btn-success">
                                <i class="bi bi-pencil"></i>
                            Editar
                            </button>
                            <button type="button" class="btn btn-danger">
                                <i class="bi bi-trash3"></i>
                            Eliminar
                            </button>
                        </div>
                    </td>
                </tr> --}}

@endsection