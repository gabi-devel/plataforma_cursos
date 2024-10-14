<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'nullable',
            'descripcion' => 'nullable',
            'imagen' => 'nullable'
        ]);

        // Crear y guardar el curso
        Curso::create([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'imagen' => $request->input('imagen'),
            'habilitado' => $request->input('habilitado', 1) // Habilitado
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso registrado correctamente.');
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
        // Acá se debería editar para deshabilitar o habilitar el curso
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        // Acá se debería actualizar para deshabilitar o habilitar el curso
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        //
    }
}
