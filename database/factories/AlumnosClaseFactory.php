<?php

namespace Database\Factories;

use App\Models\Grupo;
use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\alumnos_clase>
 */
class AlumnosClaseFactory extends Factory
{
 
    public function definition(): array
    {
        static $indice=-1;
        $indice++;
        $ac = [
            ['CL001', NULL,'21430322','AAG'],
            ['CL002', NULL,'21430330','AAG'],
            ['CL003', NULL,'21430336','AAG'],
        ];
        return [
            'idClases'=>$ac[$indice][0],
            'calificacion'=>$ac[$indice][1],
            'noctrl'=>$ac[$indice][2],
            'idGrupo'=>$ac[$indice][3]
        ];
        // return [
        //     'idClases' => $this->faker->bothify('CL###'), // Genera un identificador único para idClases
        //     'calificacion' => $this->faker->randomFloat(2, 0, 100), // Calificación entre 0 y 100
        //     'noctrl' => Alumno::query()->inRandomOrder()->value('noctrl') ?? Alumno::factory()->create()->noctrl, // Busca un alumno existente o crea uno nuevo si no hay registros
        //     'idGrupo' => Grupo::query()->inRandomOrder()->value('idGrupo') ?? Grupo::factory()->create()->idGrupo, // Relación con la tabla grupos
        // ];
    }
}
