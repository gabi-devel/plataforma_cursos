@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Por hacer:</h3>
    <h4>Pedidos:</h4>
    <ul>
        <li>Bien simple, intuitiva</li>
        <li>Basarme en colores de https://hseing.com/
            <br>color: #06303a;
            background-color: #169756;
            Logo: #52bc00;
        </li>
        <li>Login con Usuario y contraseña</li>
        <li>Cada usuario tenga acceso a determinados cursos</li>
        <li>Para determinada lista de usuarios la empresa 1 va a tener 20 usuarios. Esos 20
            usuarios que le puedan rendir a un administrador (el dueño de la empresa) un control
            de cómo van avanzando/finalizando los cursos.
        </li>
    </ul>
    <h4>Pensar:</h4>
    <ul>
        <li>Acceso a Admin</li>
        <li>Como ver progreso de los usuarios</li>
        <li></li>
    </ul>
    <ul>
        <li>Formulario de registro interno que te permita gestionar los usuarios</li>
        <li>Panel de admin (quizás): sino simplemente una página con link para cargar nuevo curso y link para cargar nueva unidad</li>
    </ul>
    <h4>Más adelante:</h4>
    <ul>
        <li>Carga de Contenido de Cursos desde formulario</li>
        <li>Agregar manualmente a los empleados como estudiantes</li>
        <li>Progreso del estudiante en cada curso</li>
        <li>Validaciones (para que no molesten ahora mientras desarrollamos)</li>
    </ul>
    <h4>Quizás:</h4>
    <ul>
        <li>Cursos por orden alfabético</li>
        <li>En formulario de cursos: cargar imágen para curso</li>
        <li>Tabla para tipo de usuario: admin o estudiante</li>
        <li>Tabla SQL para agregar los datos de: Multiple choice al final de cada unidad</li>
        <li>Certificación PDF</li>
    </ul>
</div>
@endsection