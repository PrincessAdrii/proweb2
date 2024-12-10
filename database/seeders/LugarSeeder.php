<?php

namespace Database\Seeders;

use App\Models\Lugar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LugarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 26) as $i) {
            Lugar::factory()->create(); 
        }
         
    }
}
