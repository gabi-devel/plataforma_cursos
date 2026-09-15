@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="../css/welcome.css">
@endsection

@section('content')

{{-- <body> --}}
    <div class="background-container">
        <img src="../HSE-Banner11.jpg" alt="Background" class="background-image">
        <div class="button-container">
            <a href="{{ route('login') }}">
                <button class="btn custom-btn">Ir a los cursos</button>
            </a>
        </div>
    </div>

{{-- </body> --}}

@endsection
