<?php

namespace Database\Seeders;

use App\Models\Reticula;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReticulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 7) as $i) {
            Reticula::factory()->create();
        }        
    }
}
