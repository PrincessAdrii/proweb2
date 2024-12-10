<?php

namespace Database\Seeders;

use App\Models\PersonalPlaza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalPlazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 1) as $i) {
            PersonalPlaza::factory()->create();
        } 
    }
}
