<?php

namespace Database\Seeders;

use App\Models\Edificio;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EdificioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 6) as $i) {
            Edificio::factory()->create();
        }
    }
}
