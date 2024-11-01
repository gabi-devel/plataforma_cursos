<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\UnidadController;


/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', [CursoController::class, 'index'])->name('cursos.index');

Auth::routes();

Route::resource('cursos', CursoController::class);
/* Route::resource('unidades', UnidadController::class); */
/* Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index'); */
Route::get('/curso', [CursoController::class, 'create'])->name('cursos.create');
Route::get('/unidad', [UnidadController::class, 'create'])->name('unidades.create');

// Entrar por el link al curso, con sus unidades
Route::get('/unidadescursos/{curso_id}', [UnidadController::class, 'curso'])->name('unidades_curso');
// Obtener las unidades de un curso específico
Route::get('/cursos/{curso}/unidades', [UnidadController::class, 'obtenerUnidades'])->name('unidades.get');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pendientes', function () {return view('pendientes');})->name('pendientes');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
