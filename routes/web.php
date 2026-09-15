<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MultipleChoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfesorController;


/* Route::get('/', function () {
    return view('auth.login'); 
})->middleware('guest');  */// Solo para usuarios no autenticados
Route::get('/', function () { // Si el usuario está autenticado, redirigir según su rol
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->rol === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->rol === 'profesor') {
            return redirect('/profesores/home');
        } else {
            return redirect('/cursos');
        }
    }
    return view('welcome'); 
});

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/profesores/home', [ProfesorController::class, 'home'])->name('profesores.home');
    Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');

/* Route::get('/admin/dashboard', function() {
    return view('admin.dashboard');
})->middleware('auth'); */
Route::get('/profesor/{cursoId}/usuarios', [ProfesorController::class, 'mostrarUsuarios'])->name('profe.usuarios');
 
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
    /* Route::get('/cursos/{curso_id}/unidades', [UnidadController::class, 'show'])->name('unidades.show'); */
    Route::get('/cursos/{curso_id}/unidades/{unidad_id?}', [UnidadController::class, 'index'])->name('unidades.index');
});

Route::get('/profesores/cursos', [ProfesorController::class, 'index2'])->name('profecurso');
/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */

Route::get('/pendientes', function () {return view('pendientes');})->name('pendientes');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/cursos', [AdminController::class, 'index22'])->name('admincurso');
Route::get('/cursos/{cursoId}/usuarios', [AdminController::class, 'mostrarUsuarios'])->name('cursos.usuarios');

// Ruta para ver el estado del examen
Route::get('/multiple-choice/{examenId}/{usuario}', [MultipleChoiceController::class, 'verificarEstadoExamen'])->name('ver_multiple_choice');
// Ruta para guardar las respuestas
Route::post('/multiple-choice/guardar-respuestas/{examenId}', [MultipleChoiceController::class, 'guardarRespuestas'])->name('guardar_respuestas');
// Ruta para generar y descargar el certificado
Route::get('/descargar-certificado/{examenId}', [MultipleChoiceController::class, 'descargarCertificado'])->name('descargar_certificado');
// Ruta para mostrar el resultado
Route::get('/resultado/{examenId}/{resultado}/{totalPreguntas}/{porcentaje}/{intentosFallidos}/{usuario}', function ($examenId, $resultado, $totalPreguntas, $porcentaje, $intentosFallidos, $usuario) {
    return view('examenes.resultado', compact('examenId', 'resultado', 'totalPreguntas', 'porcentaje', 'intentosFallidos', 'usuario'));
})->name('ver_resultado');
Route::post('/reiniciar-curso/{cursoId}', [MultipleChoiceController::class, 'reiniciarCurso'])->name('reiniciar_curso');


/*  Route::get('/declaracionjurada', function () {
  return view('auth.declaracion_jurada');
})->name('auth.declaracion_jurada');  */
Route::get('/declaracionjurada', [ProfileController::class, 'mostrarDeclaracion'])->name('auth.declaracion_jurada');
Route::post('/declaracionjurada', [ProfileController::class, 'confirmarDeclaracion'])->name('declaracion.confirm');

Route::get('admin/profesores', [ProfesorController::class, 'index'])->name('profesores.index');
Route::get('admin/profesores/{profesorId}/cursos', [ProfesorController::class, 'mostrarCursos'])->name('profesor.cursos');

Route::get('profesores/create-user', [ProfesorController::class, 'createUser'])->name('admin.profesores.createUser');
Route::post('profesores/store-user', [ProfesorController::class, 'storeUser'])->name('admin.profesores.storeUser');