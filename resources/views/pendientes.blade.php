@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Hecho:</h3>
    <ul>
        <li>Bien simple, intuitiva</li>
        <li>Basarme en colores de https://hseing.com/
            <br>color: #06303a;
            background-color: #169756;
            Logo: #52bc00;
        </li>
        <li>Login con Usuario y contraseña</li>
        <li>Acceso a Admin</li>
        <li>Rol de usuario: admin o estudiante</li>
    </ul>

    <h3>Por hacer:</h3>
    <ul>
        <li>Cada usuario tenga acceso a determinados cursos</li>
        <li>Para determinada lista de usuarios la empresa 1 va a tener 20 usuarios. Esos 20
            usuarios que le puedan rendir a un administrador (el dueño de la empresa) un control
            de cómo van avanzando/finalizando los cursos.
        </li>
    </ul>
    <h4>Dudas:</h4>
    <ul>
        <li>Progreso de los usuarios</li>
        <li>Examen con multiple-choice sólo 1 al final de cada unidad?</li>
    </ul>
    <h4>Más adelante:</h4>
    <ul>
        {{-- <li>Formulario de registro interno que te permita gestionar los usuarios</li>
        <li>Panel de admin (quizás): sino simplemente una página con link para cargar nuevo curso y link para cargar nueva unidad</li>
        <li>Carga de Contenido de Cursos desde formulario</li>
        <li>Agregar manualmente a los empleados como estudiantes</li>
        <li>Progreso del estudiante en cada curso</li> --}}
        <li>Validaciones</li>
    </ul>
    <h4>Quizás:</h4>
    <ul>
        <li>Cursos por orden alfabético</li>
        <li>{{-- En formulario de cursos: cargar  --}}Imagen para cada curso</li>
        {{-- <li>Tabla SQL para agregar los datos de: Multiple choice al final de cada unidad</li>
        <li>Certificación PDF</li> --}}
    </ul>
</div>
@endsection