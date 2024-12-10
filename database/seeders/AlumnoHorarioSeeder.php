<?php

namespace Database\Seeders;

use App\Models\AlumnoHorario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnoHorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 55) as $i) {
            AlumnoHorario::factory()->create();  
        }
    }
}
