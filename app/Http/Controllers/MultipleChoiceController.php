<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreguntaMultipleChoice;
use App\Models\OpcionMultipleChoice;
use App\Models\AlumnoExamen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserDato;

class MultipleChoiceController extends Controller
{
    public function mostrarMultipleChoice($examenId, $usuario) {
        $examenId_curso = $examenId;
        /* dd($cursoId);
        dd($usuario->id); */
        $cantidad_preguntas = 6;
        $preguntas = PreguntaMultipleChoice::where('examen_id', $examenId_curso)
            ->with('opcionesMultipleChoice')
            ->inRandomOrder() // Selecciona las preguntas en un orden aleatorio
            ->take($cantidad_preguntas) 
            ->get();

        // Mezcla las opciones para cada pregunta
        $preguntas->each(function ($pregunta) {
            $pregunta->opcionesMultipleChoice = $pregunta->opcionesMultipleChoice->shuffle();
        });

        return view('examenes.multiple_choice', compact('preguntas', 'examenId'));
    }

    public function guardarRespuestas(Request $request, $examenId) { // examenId es curso_id en realidad
        //dd($request);
        $user = Auth::user();
        $usuario = $user->id;

        $totalPreguntas = PreguntaMultipleChoice::where('examen_id', $examenId)->count();

        // Contar intentos anteriores con resultados desaprobados
        $intentosFallidos = AlumnoExamen::where('examen_id', $examenId)
        ->where('user_id', $user->id)
        ->where('resultado', '<', $totalPreguntas * 60)
        ->count();
        //dd($intentosFallidos);

        // Inicializamos el resultado
        $resultado = 0;
        $conteoPreguntas = 0;

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
                
                $conteoPreguntas++;
            }
        }
        // Calcula el porcentaje
        $porcentaje = ($conteoPreguntas > 0) ? ($resultado * 100) / $conteoPreguntas : 0;

        try {
            // Guardamos el resultado en la tabla alumnos_examenes
            AlumnoExamen::create([
                'examen_id' => $examenId, // Suponiendo que el examen está relacionado con la unidad
                'user_id' => $user->id,
                'resultado' => ($resultado / $conteoPreguntas) * 100,
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }


        // Pasa el porcentaje a la vista
        //return view('examenes.resultado', compact('resultado', 'totalPreguntas', 'porcentaje', 'intentosFallidos', 'examenId'));
        return redirect()->route('ver_resultado', [
            'examenId' => $examenId,
            'resultado' => $resultado,
            'totalPreguntas' => $conteoPreguntas,
            'porcentaje' => $porcentaje,
            'intentosFallidos' => $intentosFallidos,
            'usuario' => $usuario
        ]);
    }
    public function reiniciarCurso($cursoId)
    {
        $userId = auth()->id();
    
        // Actualizar la columna 'unidad_leida' a 0 para este usuario y curso
        DB::table('usuarios_cursos')->where('user_id', $userId)
            ->where('curso_id', $cursoId)
            ->update(['unidad_leida' => 0, 'updated_at' => now()]);

        // Eliminar los registros de la tabla 'alumnos_examenes' para este usuario y curso
        DB::table('alumnos_examenes')
            ->where('user_id', $userId)
            ->where('examen_id', $cursoId) // Asumiendo que curso_id corresponde a examen_id
            ->delete();
    
        // Redirigir a la página del curso
        return redirect()->route('unidades_curso', ['curso_id' => $cursoId]);
    }
    

    public function verificarEstadoExamen($examenId, $user) {
        //$user = Auth::user();
        $userId = $user;
        //dd($examen_id);
        // Verificar si el usuario ya realizó el examen
        $examenResultado = AlumnoExamen::where('user_id', $userId)
                            ->where('examen_id', $examenId)
                            ->latest()
                            ->first();

        // Si no hay registro del examen, mostrar el multiple choice
        if($examenResultado === null) {
            return $this->mostrarMultipleChoice($examenId, $userId);
        }

        if ($examenResultado->resultado >= 60) {
               return view('examenes.aprobado'); // Vista de examen aprobado
               //return $this->guardarRespuestas(Request $request, $examenId)
        } 

        // Si el resultado del examen es menor a 60, mostrar nuevamente el examen
        return $this->mostrarMultipleChoice($examenId, $userId); 
    }

    public function descargarCertificado($examenId)
    {
        $user = Auth::user();

        // Obtener el registro de AlumnoExamen para este examen y usuario
        $alumnoExamen = AlumnoExamen::where('examen_id', $examenId)
            ->where('user_id', $user->id)
            ->first();

        $usuarioExamen = User::where('id', $user->id)
            ->first();

        $usuarioDato = UserDato::where('user_id', $user->id)->first();

        // Verificar si el examen fue aprobado
        if (!$alumnoExamen || $alumnoExamen->resultado < 60) {
            return redirect()->back()->with('error', 'No tienes permiso para descargar este certificado.');
        }

        // Obtener los datos del examen desde la tabla `examenes`
        $examen = DB::table('examenes')->where('id', $examenId)->first();

        // Verificar si el examen existe
        if (!$examen) {
            return redirect()->back()->with('error', 'Examen no encontrado.');
        }

        //dd($usuarioDato);

        // Crear el contenido HTML del certificado
        $content = "
        <style>
                /* General Styles */
                body {
                    font-family: 'Georgia', serif;
                    margin: 0;
                    padding: 0;
                    background: #f9f9f9;
                }

                .container {
                    /*width: 90%;*/
                    margin: 20px auto;
                    padding: 20px;/**/
                    background: #ffffff;
                    border: 2px solid #000000;
                    border-radius: 15px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                }

                /* Header Styles */
                .header {
                    text-align: center;
                    margin-bottom: 20px;
                    /*background-color: #1d6c36;*/
                }

                .header h1 {
                    font-size: 36px;
                    color: /*#1a1a1a;*/#fff;
                    color: #1d6c36;
                    margin: 0;
                    font-weight: bold;
                    text-transform: uppercase;
                }

                .header p {
                    font-size: 18px;
                    color: #4a4a4a;
                    margin: 5px 0;
                }

                /* Recipient Info Styles */
                .recipient {
                    text-align: center;
                    margin: 30px 0;
                }

                .recipient p {
                    font-size: 20px;
                    line-height: 1.5;
                    color: #2a2a2a;
                }

                .recipient .name {
                    font-size: 24px;
                    font-weight: bold;
                    color: #000000;
                    text-transform: uppercase;
                }

                /* Footer Styles */
                .footer {
                    margin-top: 30px;
                    text-align: right;
                }

                .footer p {
                    font-size: 16px;
                    color: #4a4a4a;
                    margin: 5px 0;
                }

                /* Signature Area */
                .signature {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-top: 40px;
                    border-top: 1px solid #cccccc;
                    padding-top: 10px;
                }

                .signature .authority {
                    text-align: center;
                    flex: 1;
                    margin: 0 10px;
                }

                .signature .authority p {
                    font-size: 14px;
                    color: #4a4a4a;
                    margin: 5px 0;
                }

                .signature .authority .name {
                    font-size: 16px;
                    font-weight: bold;
                    color: #000000;
                }

        </style>
        <div class='container'>
            <div class='header'>
                <h1>Certificado de Aprobación</h1>
                <p>Otorgado por la Empresa</p>
            </div>
            <div class='recipient'>
                <p>Se certifica que:</p>
                <p class='name'>{$usuarioDato->nombre} {$usuarioDato->apellido}</p>
                <p>Con DNI: {$usuarioExamen->name}</p>
                <p>Ha aprobado el examen:</p>
                <p class='name'>{$examen->titulo}</p>
                <p>El día: " . now()->format('d/m/Y') . "</p>
                <p>Con un puntaje de: {$alumnoExamen->resultado}</p>
            </div>
            
        </div>
        ";
/* <div class='footer'>
                <p>Este certificado es válido según los registros de la institución.</p>
            </div>
            <div class='signature'>
                <div class='authority'>
                    <p class='name'>Nombre del Autoridad</p>
                    <p>Cargo o Título</p>
                </div>
                <div class='authority'>
                    <p class='name'>Nombre del Firma 2</p>
                    <p>Cargo o Título</p>
                </div>
            </div> */
        // Inicializar Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);

        // Cargar el contenido HTML
        $dompdf->loadHtml($content);

        // (Opcional) Configurar tamaño de papel
        $dompdf->setPaper('A4', 'portrait');

        // Renderizar el PDF
        $dompdf->render();

        // Enviar el PDF al navegador
        return $dompdf->stream('certificado.pdf');
    }
}
