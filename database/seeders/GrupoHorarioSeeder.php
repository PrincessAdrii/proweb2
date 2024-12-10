<?php

namespace Database\Seeders;

use App\Models\GrupoHorario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrupoHorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 55) as $i) {
            GrupoHorario::factory()->create();  
        }
    }
}
