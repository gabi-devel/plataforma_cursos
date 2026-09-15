<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function index()
    {
        /* $userRol = auth()->user();
        if ($userRol->rol === 'profesor') {
            return redirect()->route('profesores.home');
        } */
        
        $cursos = Curso::with('unidades')->get();
        $userId = auth()->id();

        // Iterar sobre cada curso para calcular el progreso
        foreach ($cursos as $curso) {
            // Obtener la última unidad leída del usuario para este curso
            $unidadLeida = DB::table('usuarios_cursos')
                ->where('curso_id', $curso->id)
                ->where('user_id', $userId)
                ->value('unidad_leida') ?? 0; // Si no hay unidad leida, establecer como 0%
            
            // Orden más alto
            $ultimaUnidad = $curso->unidades->max('orden');

            $progreso = $ultimaUnidad > 0 ? ($unidadLeida / $ultimaUnidad) * 100 : 0;
//dd($curso);
            // Porcentaje
            $curso->progreso = $progreso;
        }
        return view('cursos.index', compact('cursos', 'progreso'));
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
