<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CursoController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('cursos', CursoController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
