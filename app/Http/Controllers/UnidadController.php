<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Models\Curso;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        $cursos = Curso::all();

        return view('form_unidad', compact('cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'curso_id' => 'nullable',
            'titulo' => 'nullable|numeric',
            'contenido' => 'nullable',
            'video' => 'nullable'
        ]);

        Unidad::create([
            'titulo' => $request->input('titulo'),
            'contenido' => $request->input('descripcion'),
            'video' => $request->input('imagen')
        ]);

        return redirect()->route('unidades.index')->with('success', 'Unidad registrada correctamente.');
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
