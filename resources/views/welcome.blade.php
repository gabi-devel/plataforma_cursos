@extends('layouts.app')

@section('content')

<body style="
    overflow: hidden;
    margin: 0;
">
<div class="background" style="
    background-image: url('banner-empresa.png');
    background-size: cover; /* Hace que la imagen cubra todo el contenedor */
    background-position: center; /* Centra la imagen */
    background-repeat: no-repeat; /* Evita que la imagen se repita */
    width: 100vw; /* Ocupa el 100% del ancho de la ventana */
    height: 91vh; /* Ocupa el 100% del alto de la ventana */
    overflow: hidden; /* Oculta el scroll horizontal */
    background-attachment: fixed;
    background-color: rgba(0, 0, 0, 0.5); /* Capa oscura */
    background-blend-mode: darken; /* Mezcla la capa oscura con la imagen */
">
<div class="button-container">
    <style>
    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    
    .button-container button {
        transform: translateX(22vh);
    }
    .custom-btn, .custom-btn:hover {
        background-color: #06303a;
        color: white;
        font-size: 1.5rem; /* Aumenta el tamaño del texto */
        padding: 1rem 2rem; /* Aumenta el tamaño del botón en ambos ejes */
    }
    .custom-btn:active,
    .custom-btn:focus {
        background-color: #169756;
        outline: none;
    }
    </style>
    <a href="{{ route('login') }}">
        <button class="btn custom-btn">Ir a los cursos</button>
    </a>
</div>
</div>

</body>

@endsection
