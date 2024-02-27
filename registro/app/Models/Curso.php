<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    // Definir la tabla asociada al modelo
    protected $fillable = ['nombre', 'docente'];

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumnos_cursos', 'id_curso', 'id_alumno');
    }
}
