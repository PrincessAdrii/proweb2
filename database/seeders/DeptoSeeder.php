<?php

namespace Database\Seeders;

use App\Models\Depto;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Reticula;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 10) as $i) {
            Depto::factory()->create();
        }
        // Depto::factory(3)->create()->each(function ($depto) {
        //     Carrera::factory(3)->create([
        //         'depto_id' => $depto->idDepto, 
        //     ])->each(function ($carrera) {
        //         Alumno::factory(3)->create([
        //             'carrera_id' => $carrera->idCarrera, 
        //         ]);
        //         Reticula::factory(2)->create([
        //             'carrera_id' => $carrera->idCarrera, 
        //         ])->each(function ($reticula) {
        //             Materia::factory(2)->create([
        //                 'reticula_id' => $reticula->idReticula, 
        //             ]);
        //         });
        //     });
        // });
        
        // Periodo::factory(5)->create();
    }
}
