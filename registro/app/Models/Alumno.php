<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre",
        "apellido",
        "email",
        // "telefono",
    ];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'alumnos_cursos', 'id_alumno', 'id_curso');
    }
}
