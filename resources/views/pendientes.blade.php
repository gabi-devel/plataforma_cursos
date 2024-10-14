@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Por hacer:</h3>
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
        <li>En formulario de cursos: cargar imágen para curso</li>
        <li>Tabla para tipo de usuario: admin o estudiante</li>
        <li>Tabla SQL para agregar los datos de: Multiple choice al final de cada unidad</li>
        <li>Certificación PDF</li>
    </ul>
</div>
@endsection