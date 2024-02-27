<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();
        return response()->json($cursos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_docente' => 'required',
            'nombre' => 'required',
            'curso' => 'required',
        ]);

        $curso = Curso::create($request->all());
        return response()->json($curso);
        return ['¡Curso creado con Éxito!'];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curso = Curso::find($id);
        return response()->json($curso);
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_docente' => 'required',
            'nombre' => 'required',
            'curso' => 'required',
        ]);

        $curso = Curso::find($id);
        $curso->update($request->all());
        return response()->json($curso);
        return ['¡Curso actualizado con Éxito!'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Curso::find($id);
        $curso->delete($id);

        return response()->json($curso);
        return ['¡Curso eliminado con Éxito!'];
    }
}
