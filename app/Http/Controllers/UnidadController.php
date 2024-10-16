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

        return view('unidades.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'titulo' => 'nullable|string',
            'contenido' => 'nullable',
            'video' => 'nullable'
        ]);

        $ultimaUnidad = Unidad::where('curso_id', $request->curso_id)->max('num_unidad');
        Unidad::create([
            'curso_id' => $request->curso_id,
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
