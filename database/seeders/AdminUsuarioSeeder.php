<?php

namespace Database\Seeders;

use App\Models\Depto;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Reticula;
use App\Models\AdminUsuario;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminUsuario::factory()->create();
    }
}
