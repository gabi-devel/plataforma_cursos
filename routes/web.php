<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MultipleChoiceController;

/* Route::get('/', function () {
    return view('auth.login'); 
})->middleware('guest');  */// Solo para usuarios no autenticados
Route::get('/', function () {
    // Si el usuario está autenticado, redirigir según su rol
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->rol === 'admin') {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/cursos');
        }
    }
    return view('welcome'); 
});

Auth::routes();

Route::get('login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/admin/dashboard', function() {
    return view('admin.dashboard');
})->middleware('auth');

Route::resource('cursos', CursoController::class)->middleware('auth');
Route::resource('unidades', UnidadController::class)->middleware('auth');

// Entrar por el link al curso, con sus unidades
Route::get('/curso/{curso_id}', [UnidadController::class, 'index'])->name('unidades_curso')->middleware('auth');

Route::get('/curso', [CursoController::class, 'create'])->name('cursos.create');
Route::get('/unidad', [UnidadController::class, 'create'])->name('unidades.create');

// Obtener las unidades de un curso específico
Route::get('/cursos/{curso}/unidades', [UnidadController::class, 'obtenerUnidades'])->name('unidades.get');
Route::get('/cursos/{cursoId}', [CursoController::class, 'mostrarCurso'])->name('cursos.mostrar');
Route::post('/marcar-unidad-leida', [UnidadController::class, 'marcarUnidadLeida'])->name('marcar.unidad.leida')->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::get('/cursos/{curso_id}/unidades/{unidad_id}', [UnidadController::class, 'show'])->name('unidades.show');
    Route::get('/cursos/{curso_id}/unidades', [UnidadController::class, 'index'])->name('unidades.index');
});


/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */

Route::get('/pendientes', function () {return view('pendientes');})->name('pendientes');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

//Route::get('/examenes/{unidadId}/multiple-choice', [MultipleChoiceController::class, 'mostrarMultipleChoice'])->name('ver_multiple_choice');
Route::get('/unidades/1/multiple-choice', [MultipleChoiceController::class, 'mostrarMultipleChoice'])->name('ver_multiple_choice');
Route::post('/unidades/1/guardar-respuestas', [MultipleChoiceController::class, 'guardarRespuestas'])->name('guardar_respuestas');
