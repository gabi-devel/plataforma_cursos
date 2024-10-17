<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Models\Curso;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    public function index()
    {
        $unidades = Unidad::all();
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
            'orden' => 'required',
            'titulo' => 'nullable|string',
            'contenido' => 'nullable',
            'video' => 'nullable'
        ]);

        $cursoId = $request->input('curso_id');
        $posicionDeseada = $request->input('orden');


        // Incrementar el orden de las unidades siguientes
        Unidad::where('curso_id', $cursoId)
                ->where('orden', '>=', $posicionDeseada)
                ->increment('orden');

        $unidad = new Unidad();
        $unidad->curso_id = $cursoId;
        $unidad->orden = $posicionDeseada;
        $unidad->titulo = $request->input('titulo');
        $unidad->contenido = $request->input('contenido');
        $unidad->video = $request->input('video');
        $unidad->habilitado = $request->input('habilitado', 1); // Habilitado 
        $unidad->save();

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
