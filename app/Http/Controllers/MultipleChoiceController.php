<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreguntaMultipleChoice;
use App\Models\OpcionMultipleChoice;
use App\Models\AlumnoExamen;
use Illuminate\Support\Facades\Auth;


class MultipleChoiceController extends Controller
{
    public function mostrarMultipleChoice() {
        $unidadId =1;
        // Obtiene todas las preguntas relacionadas con la unidad
        $preguntas = PreguntaMultipleChoice::where('examen_id', $unidadId)
            ->with('opcionesMultipleChoice')
            ->get()
            ->shuffle(); // Mezcla las preguntas

        // Mezcla las opciones para cada pregunta
        $preguntas->each(function ($pregunta) {
            $pregunta->opcionesMultipleChoice = $pregunta->opcionesMultipleChoice->shuffle();
        });

        return view('examenes.multiple_choice', compact('preguntas'));
    }

    public function guardarRespuestas(Request $request) {
        $unidadId = 1;
        $user = Auth::user();

        // Inicializamos el resultado
        $resultado = 0;
        $totalPreguntas = 0;

        // Recorremos todas las respuestas enviadas
        // Puedes validar y guardar las respuestas en una tabla de resultados
        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'pregunta_')) {
                $preguntaId = str_replace('pregunta_', '', $key);
                $opcionId = $value;
                
                // Aquí podrías verificar si la opción seleccionada es correcta
                $opcion = OpcionMultipleChoice::find($opcionId);
                if ($opcion && $opcion->es_correcta) {
                    $resultado++; // Incrementamos el resultado si la respuesta es correcta
                }
                
                $totalPreguntas++;
            }
        }
        // Guardamos el resultado en la tabla alumnos_examenes
        AlumnoExamen::create([
            'examen_id' => $unidadId, // Suponiendo que el examen está relacionado con la unidad
            'user_id' => $user->id,
            'resultado' => $resultado,
        ]);
        
        return view('examenes.resultado', compact('resultado', 'totalPreguntas'));
    }
}
