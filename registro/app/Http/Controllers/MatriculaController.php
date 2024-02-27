<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validacion = Validator::make($request->all(), [
            'id_alumno' => 'required|max:10',
            'id_asistencia' => 'required|max:3',
        ]);

        if ($validacion->fails()) {
            return response()->json($validacion->errors(), 400);
        }

        $nuevaAsistencia = Asistencia::create([
            'id_alumno' => $request->id_alumno,
            'id_asistencia' => $request->id_asistencia,

        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matricula $matricula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matricula $matricula)
    {
        //
    }
}
