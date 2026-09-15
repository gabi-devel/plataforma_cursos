<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\Curso;
use App\Models\AlumnoExamen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::with(['usuario.datos', 'cursos'])->get();

        return view('admin.profesores', compact('profesores'));
    }

    public function mostrarCursos($profesorId)
    {
        $profesor = Profesor::with('cursos')->findOrFail($profesorId);

        return view('admin.profesor_cursos', compact('profesor'));
    }

    public function home() {
        $profesor = Auth::user(); // Obtener el usuario autenticado
        //dd($profesor);
        /* $cursos = Curso::where('profesor_id', $profesor->id)->get(); // Relación por ID del profesor

        return view('profesor.cursos', compact('cursos')); */

        $cursos = Curso::withCount(['usuarios' => function ($query) {
            $query->where('rol', 'empleado');
        }])->get();

        // Crear un arreglo para la vista con la información de cada curso
        /* $cursosConEstadisticas = $cursos->map(function ($curso) {
            // Filtrar solo empleados inscritos en este curso
            $empleadosInscritos = $curso->usuarios()->where('rol', 'empleado')->get();

            // Contar estudiantes inscritos (empleados)
            $cantidadEstudiantes = $empleadosInscritos->count();

            // Determinar la última unidad del curso (mayor orden)
            $ultimaUnidadOrden = $curso->unidades->max('orden');

            // Contar cuántos empleados han completado el curso
            $cantidadCompletados = $empleadosInscritos->filter(function ($empleado) use ($curso, $ultimaUnidadOrden) {
                $unidadLeida = $empleado->cursos->find($curso->id)->pivot->unidad_leida;
                return $unidadLeida >= $ultimaUnidadOrden;
            })->count();

             // Devolver el objeto $curso con las estadísticas
            $curso->cantidadEstudiantes = $cantidadEstudiantes;
            $curso->cantidadCompletados = $cantidadCompletados;
            return $curso; // Mantener el objeto del modelo Curso
        }); */
        $cursosConEstadisticas = $cursos->map(function ($curso) {
            // Filtrar solo empleados inscritos en este curso
            $empleadosInscritos = $curso->usuarios()->where('rol', 'empleado')->get();
    
            // Contar estudiantes inscritos (empleados)
            $cantidadEstudiantes = $empleadosInscritos->count();
    
            // Determinar la última unidad del curso (mayor orden)
            $ultimaUnidadOrden = $curso->unidades->max('orden');
    
            // Contar cuántos empleados han completado el curso
            $cantidadCompletados = $empleadosInscritos->filter(function ($empleado) use ($curso, $ultimaUnidadOrden) {
                $unidadLeida = $empleado->cursos->find($curso->id)->pivot->unidad_leida;
                return $unidadLeida >= $ultimaUnidadOrden;
            })->count();
    
            // Contar cuántos empleados aprobaron el examen del curso
            $cantidadAprobados = $empleadosInscritos->filter(function ($empleado) use ($curso) {
                $examenResultado = AlumnoExamen::where('user_id', $empleado->id)
                    ->where('examen_id', $curso->id) // Asegura que el examen corresponde al curso
                    ->orderBy('id', 'desc')
                    ->first();
    
                return $examenResultado && $examenResultado->resultado >= 60;
            })->count();
    
            // Agregar las estadísticas al curso
            $curso->cantidadEstudiantes = $cantidadEstudiantes;
            $curso->cantidadCompletados = $cantidadCompletados;
            $curso->cantidadAprobados = $cantidadAprobados;
    
            return $curso; // Mantener el objeto del modelo Curso
        });
        
        return view('profesor.cursos', ['cursos' => $cursosConEstadisticas]);

    }

    public function mostrarUsuarios($cursoId){
        // Obtener el curso específico
        //$curso = Curso::with('usuarios')->findOrFail($cursoId);

        /* $curso = Curso::withCount(['usuarios' => function ($query) {
            $query->where('rol', 'empleado');
        }, 'unidades'])->findOrFail($cursoId); */
        // Obtener el curso específico con usuarios y unidades
        $curso = Curso::with(['usuarios' => function ($query) {
            $query->with('datos')->where('rol', 'empleado'); // Cargar relación 'datos' para cada usuario
        }, 'unidades'])->findOrFail($cursoId);

        /* $cursos = User::with('datos')->get();

        $cursos = $cursos->sortBy(function ($curso) {
            return $curso->datos->apellido ?? ''; // Ordenar por apellido, o vacío si no existe
        }); */

        /* $cursosConEstadisticas = $cursos->map(function ($curso) {
            // Filtrar solo los empleados inscritos
            $empleadosInscritos = $curso->usuarios()->where('rol', 'empleado')->get();
            //dd($empleados); */

            $totalUnidades = $curso->unidades->max('orden');

            // Añadir datos de completados y exámenes a cada empleado
            $empleadosConExamenes = $curso->usuarios->map(function ($empleado) use ($totalUnidades, $curso) {
                // Calcular porcentaje de avance
                $unidadLeida = $empleado->cursos->find($curso->id)->pivot->unidad_leida;
                $porcentajeAvance = ($unidadLeida / $totalUnidades) * 100;
                $empleado->porcentajeAvance = round($porcentajeAvance, 2);

                // Obtener el resultado del examen
                $examenResultado = AlumnoExamen::where('user_id', $empleado->id)
                    ->where('examen_id', $curso->id) // Asegura que el examen corresponde al curso
                    ->orderBy('id', 'desc')
                    ->first();

                // Determinar si está aprobado, desaprobado o aún no rindió
                $empleado->examenEstado = $examenResultado && $examenResultado->resultado != 0
                ? ($examenResultado->resultado >= 60 ? 'Aprobado' : 'Desaprobado')
                : ''; // En blanco si no hay registro o si el resultado es 0

                return $empleado;
            /* });
            $curso->empleados = $empleadosConExamenes;
            return $curso; */
        //})->sortBy('name')->values();
        })->sortBy(function ($empleado) {
        return $empleado->datos->apellido ?? ''; // Ordenar por apellido, o vacío si no existe
        })->values();
        // Pasar los datos a la vista
        return view('profesor.curso_usuarios', [
            'curso' => $curso,
            /* 'cursos' => $cursos, */
            'empleados' => $empleadosConExamenes
        ]);
    }

    public function createUser() {
        return view('admin.profesores.create_profesor');
    }
    
    public function storeUser(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol' => 'profesor',
        ]);
    
        Profesor::create([
            'user_id' => $user->id,
            'nombre' => $request->name,
            'especialidad' => $request->especialidad,
        ]);
    
        return redirect()->route('profesores.index')->with('success', 'Profesor registrado.');
    }
}
