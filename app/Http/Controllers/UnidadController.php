<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UnidadController extends Controller
{
    public function index($curso_id, $unidad_id = null) { // $unidad_id aquí representa el 'orden'
        /* if (!$unidad_id) { $unidad_id = 1; } */
        $curso = Curso::findOrFail($curso_id); 
        $unidades = Unidad::where('curso_id', $curso_id)->orderBy('orden')->get();
        
        // Obtener el valor de 'unidad_leida' para el usuario autenticado
        $unidadLeida = DB::table('usuarios_cursos')
        ->where('curso_id', $curso_id)
        ->where('user_id', auth()->id()) // Asegúrate de que el usuario está autenticado
        ->value('unidad_leida');

        // Si no existe una unidad leída (el usuario nunca ha leído una unidad), asignar una por defecto
        if (!$unidadLeida) {
            $unidadLeida = 1; // Asignar el número de la primera unidad, o el valor que desees por defecto
        }
        // Obtener la unidad correspondiente a 'unidad_leida' directamente
        $unidadMasAlta = Unidad::where('curso_id', $curso_id)
                                ->where('orden', $unidadLeida)
                                ->first();

        // Si no se encuentra la unidad correspondiente (esto debería ser muy raro si los datos están bien)
        if (!$unidadMasAlta) {
            return redirect()->back()->with('error', 'No se pudo encontrar la unidad correspondiente.');
        }

        // Obtener la unidad actual si la $unidad_id está definida
        $unidadActual = Unidad::where('curso_id', $curso_id)
                            ->where('orden', $unidadLeida ?: $unidadMasAlta->orden)
                            ->firstOrFail();

        return view('unidades.index', compact('curso', 'unidad_id', 'unidadActual', 'unidades', 'unidadLeida'));
    }

    public function create()
    {
        $cursos = Curso::all();
        $unidades = Unidad::all();

        return view('unidades.create', compact('cursos', 'unidades'));
    }
    
    public function obtenerUnidades($cursoId) {
        $unidades = Unidad::where('curso_id', $cursoId)->orderBy('orden')->get();
        return response()->json($unidades);
    }

    public function store(Request $request)
    {
        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'orden' => 'required|integer|min:0',
            'titulo' => 'nullable|string',
            'contenido' => 'nullable',
            'video' => 'nullable'
        ]);

        $cursoId = $request->input('curso_id');
        $posicionDeseada = $request->input('orden');

        // Verificar si ya existen unidades para el curso
        $totalUnidades = Unidad::where('curso_id', $cursoId)->count();
        // Permitir seleccionar Unidad 1 o 0:
        if ($totalUnidades == 0) {
            if (!in_array($posicionDeseada, [0, 1])) {
                return back()->withErrors(['orden' => 'Debe elegir 0 o 1 como posición inicial cuando no hay unidades.']);
            }
        } else {
            // Verificar si ya existe una unidad con ese num de orden
            $existePosicion = Unidad::where('curso_id', $cursoId)
                                    ->where('orden', $posicionDeseada)
                                    ->exists();

            if ($existePosicion) {
                // Incrementar el orden de las unidades siguientes
                Unidad::where('curso_id', $cursoId)
                        ->where('orden', '>=', $posicionDeseada)
                        ->increment('orden');
            }
        }

        /* $unidad = new Unidad();
        $unidad->curso_id = $cursoId;
        $unidad->orden = $posicionDeseada;
        $unidad->titulo = $request->input('titulo');
        $unidad->contenido = $request->input('contenido');
        $unidad->video = $request->input('video');
        $unidad->habilitado = $request->input('habilitado', 1); // Habilitado 
        $unidad->save(); */
        Unidad::create([
            'curso_id' => $cursoId,
            'orden' => $posicionDeseada,
            'titulo' => $request->input('titulo'),
            'contenido' => $request->input('contenido'),
            'video' => $request->input('video'),
            'habilitado' => $request->input('habilitado', 1) // Habilitado
        ]);

        return redirect()->route('unidades.create')->with('success', 'Unidad registrada correctamente.');
    }

    public function marcarUnidadLeida(Request $request)
    {
        $userId = auth()->id();
        $cursoId = $request->input('curso_id');
        $unidadId = $request->input('unidad_id');
        /* $usuario = auth()->user(); $curso_id = $request->input('curso_id');
        $unidad_id = $request->input('unidad_id');
        $cursos = $usuario->cursos;  */

        // Buscar la unidad por 'id'
        $unidad = Unidad::where('curso_id', $cursoId)
        ->where('id', $unidadId)
        ->firstOrFail();

        // Obtener el número de orden de la unidad marcada
        //$unidadOrden = $unidad->orden;

        // Buscar el progreso actual del usuario en este curso
        $progresoActual = DB::table('usuarios_cursos')
        ->where('user_id', $userId)
        ->where('curso_id', $cursoId)
        ->value('unidad_leida'); // Obtiene solo el valor de 'unidad_leida'

        // Verificar si la nueva unidad es mayor que la actual
        if (is_null($progresoActual) || $unidadId > $progresoActual) {
            // Actualizar o insertar el progreso del usuario
            DB::table('usuarios_cursos')->updateOrInsert(
                ['user_id' => $userId, 'curso_id' => $cursoId],
                ['unidad_leida' => $unidadId, 'updated_at' => now()]
            );
        } 


        // Redirigir de nuevo a la vista actualizada
        return redirect()->route('unidades.index', ['curso_id' => $cursoId, 'unidad_id' => $unidadId])
                         ->with('success', 'Unidad marcada como leída.');
        
        /* // Actualiza la base de datos con la unidad leída
        $cursos->updateExistingPivot($curso_id, ['unidad_leida' => $unidad_id]);

        return response()->json(['success' => true]);  // Devuelve una respuesta JSON clara  */       
    }


    public function show($curso_id, $unidad_id) { // $unidad_id aquí representa el 'orden'
        $curso = Curso::findOrFail($curso_id);

        $unidad = Unidad::where('curso_id', $curso_id)
                          ->where('id', $unidad_id)
                          ->firstOrFail();

        $unidades = Unidad::where('curso_id', $curso_id)->orderBy('orden')->get();

        /* // Obtener el progreso del usuario
        $progreso = DB::table('usuarios_cursos')
        ->where('user_id', auth()->id())
        ->where('curso_id', $curso_id)
        ->first();

        $ultimaUnidadLeida = $progreso ? $progreso->unidad_leida : 0;

        // Verificar si la unidad solicitada está habilitada
        if ($unidad->orden > ($ultimaUnidadLeida + 1)) {
            return redirect()->route('unidades.index', $curso_id)
                            ->with('error', 'Acceso denegado a esta unidad.');
        } */

        // Retornar la vista si está habilitada
        return view('unidades.show', compact('unidad', 'unidades', 'curso', 'unidad_id'));
    }

    public function edit(Curso $curso){}
    public function update(Request $request, Curso $curso) {}
    public function destroy(Curso $curso) {}
}
