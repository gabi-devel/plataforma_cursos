<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Models\Curso;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    public function index($curso_id)
    {
        $unidades = Unidad::where('curso_id', $curso_id)->orderBy('orden')->get();
        return view('unidades.index', compact('unidades'));
    }

    public function curso($curso_id)
    {
        $unidades = Unidad::where('curso_id', $curso_id)->orderBy('orden')->get();
        return view('unidades.index', compact('unidades'));
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

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        //
    }
}
