<?php

namespace Database\Seeders;

use App\Models\Grupo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 12) as $i) {
            Grupo::factory()->create();  
        }
    }
}
