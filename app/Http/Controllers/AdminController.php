<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Curso;
use App\Models\AlumnoExamen;

class AdminController extends Controller
{
    public function index() {
        // Obtener todos los cursos con relaciones
        //$cursos = Curso::with(['unidades', 'usuarios'])->get();
        $cursos = Curso::withCount(['usuarios' => function ($query) {
            $query->where('rol', 'empleado');
        }])->get();

        // Crear un arreglo para la vista con la información de cada curso
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

             // Devolver el objeto $curso con las estadísticas
            $curso->cantidadEstudiantes = $cantidadEstudiantes;
            $curso->cantidadCompletados = $cantidadCompletados;
            return $curso; // Mantener el objeto del modelo Curso
        });
        
        return view('admin.dashboard', ['cursos' => $cursosConEstadisticas]);
    }

    public function mostrarUsuarios($cursoId){
        // Obtener el curso específico
        //$curso = Curso::with('usuarios')->findOrFail($cursoId);
        $curso = Curso::withCount(['usuarios' => function ($query) {
            $query->where('rol', 'empleado');
        }, 'unidades'])->findOrFail($cursoId);

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
                    ->first();

                // Determinar si está aprobado, desaprobado o aún no rindió
                $empleado->examenEstado = $examenResultado 
                ? ($examenResultado->resultado >= 60 ? 'Aprobado' : 'Desaprobado')
                : ''; // En blanco si no hay registro

                return $empleado;
            /* });
            $curso->empleados = $empleadosConExamenes;
            return $curso; */
        });
        // Pasar los datos a la vista
        return view('admin.curso_usuarios', [
            'curso' => $curso,
            'empleados' => $empleadosConExamenes
        ]);
    }
}
