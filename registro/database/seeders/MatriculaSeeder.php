<?php

namespace Database\Seeders;

use App\Models\Matricula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asistencia::factory(30)->create();
        $data = [
            ['nombre' => "Asistió tempranito", "letra" => "A"],
            ['nombre' => "Asistió tardecito", "letra" => "T"],
            ['nombre' => "Faltó", "letra" => "F"],
        ];

        foreach ($data as $row) {
            DB::table('asistencia')->insert([
                "nombre" => $row["nombre"],
                "letra" => $row["letra"]
            ]);
        }
    }
}
