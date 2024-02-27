<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return response()->json($alumnos);
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
            'edad' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:alumnos',
            'dni' => 'required',
        ]);

        $request->merge(['password' => bcrypt($request->input('dni'))]);

        $alumno = Alumno::create($request->all());
        return response()->json($alumno, 201);
        return ["¡Alumno Creado con Éxito!"];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alumno = Alumno::find($id);
        return response()->json($alumno);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'edad' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:alumnos' . $id,
            'dni' => 'required',
        ]);

        $request->merge(['password' => bcrypt($request->input('dni'))]);

        $alumno = Alumno::find($id);
        $alumno->update($request->all());

        return response()->json($alumno, 200);
        return ['¡Alumno Actualizado con Éxito!'];
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete($id);

        return response()->json(null, 204);
        return ['¡Alumno eliminado con Éxito!'];
    }


    // Function for assigning alumns to the courses:
    public function asignarAlumnosACursos(Request $request, $cursoId, $alumnoId)
    {
        $curso = Curso::find($cursoId);
        $curso->alumnos()->attach($alumnoId);

        return response()->json($curso, 201);
        return ['¡Alumno asignado con Éxito!'];
    }


    // Function for verification of alumns in the courses:

    public function verificarAlumnoEnCurso($alumnoId, $cursoId)
    {
        $alumno = Alumno::find($alumnoId);
        $curso = Curso::find($cursoId);
        $alumnoEnCurso = $curso->alumnos()->where('id', $alumnoId)->first();
        if ($alumnoEnCurso) {
            return response()->json($alumno, 200);
        } else {
            return response()->json(['message' => 'El alumno no se encuentra en el curso'], 404);
        }
    }
}
