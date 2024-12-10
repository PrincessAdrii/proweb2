<?php

namespace Database\Seeders;

use App\Models\Periodo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 7) as $i) {
            Periodo::factory()->create(); 
        }
    }
}
