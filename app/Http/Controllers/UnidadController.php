<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UnidadController extends Controller
{
    public function index($curso_id)
    {
        $curso = Curso::findOrFail($curso_id); 
        $unidades = Unidad::where('curso_id', $curso_id)->orderBy('orden')->get();

        $progreso = DB::table('usuarios_cursos')
                    ->where('user_id', auth()->id())
                    ->where('curso_id', $curso_id)
                    ->first();
        $ultimaUnidadLeida = $progreso ? $progreso->unidad_leida : 0;

        return view('unidades.index', compact('curso', 'unidades', 'ultimaUnidadLeida'));
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
        $unidadOrden = $request->input('unidad_id');

        // Validar los datos recibidos
        if (!$cursoId || !$unidadOrden) {
            return redirect()->back()->with('error', 'Datos inválidos.');
        }

        // Buscar o crear el progreso del usuario en este curso
        $progreso = DB::table('usuarios_cursos')
            ->updateOrInsert(
                ['user_id' => $userId, 'curso_id' => $cursoId],
                ['unidad_leida' => $unidadOrden, 'updated_at' => now()]
            );

        // Redirigir de nuevo a la vista actualizada
        return redirect()->back()->with('success', 'Unidad marcada como leída.');
    }


    public function show($curso_id, $unidad_id) {
        $unidad = Unidad::where('curso_id', $curso_id)
                    ->where('id', $unidad_id)
                    ->firstOrFail();

        $curso = Curso::findOrFail($curso_id);


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
        return view('unidades.show', compact('unidad', 'curso'));
    }

    public function edit(Curso $curso){}
    public function update(Request $request, Curso $curso) {}
    public function destroy(Curso $curso) {}
}
