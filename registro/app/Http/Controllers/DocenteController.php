<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = Docente::all();
        return response()->json($docentes);
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
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'email' => 'required',
            'telefono' => 'required',
        ]);

        $docente = Docente::create($request->all());
        return response()->json($docente);
        return ["¡Docente Creado con Éxito!"];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $docente = Docente::find($id);
        return response()->json($docente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'email' => 'required',
            'telefono' => 'required',
        ]);

        $docente =  Docente::find($id);
        $docente->update($request->all());

        return ['¡Docente Actualizado con Éxito!'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $docente = Docente::find($id);
        $docente->delete($id);

        return response()->json($docente);
        return ['¡Docente eliminado con Éxito!'];
    }
}
