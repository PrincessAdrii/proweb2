<?php

namespace Database\Seeders;

use App\Models\Personal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 13) as $i) {
            Personal::factory()->create();  
        } 
    }
}
