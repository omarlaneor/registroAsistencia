<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Dotenv\Validator;
use Exception;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asistencias = Asistencia::all();
        return response()->json($asistencias);
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
            'id_alumno' => 'required',
            'id_curso' => 'required',
            'fecha' => 'required',
            'asistencia' => 'required|in:A,T,F',
        ]);

        $asistencia = Asistencia::create([
            'id_alumno' => $request->id_alumno,
            'id_curso' => $request->id_curso,
            'fecha' => $request->fecha,
            'asistencia' => $request->asistencia,
        ]);

        return response()->json([
            'message' => 'Asistencia registrada correctamente',
            'data' => $asistencia
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }

    public function asistenciaAlumno(Request $request)
    {
        $request->validate([
            'id_alumno' => 'required',
            'id_curso' => 'required',
            'fecha' => 'required',
            'asistencia' => 'required|in:A,T,F',
        ]);

        $asistencia = new Asistencia();
        $asistencia->id_alumno = $request->id_alumno;
        $asistencia->id_curso = $request->id_curso;
        $asistencia->fecha = $request->fecha;
        $asistencia->asistencia = $request->asistencia;
        $asistencia->save();

        return response()->json([

            'message' => 'Asistencia registrada correctamente'
        ]);
    }
}
