<?php

namespace Database\Seeders;

use App\Models\Materia;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 72) as $i) {
            Materia::factory()->create();  
        }
    }
}
