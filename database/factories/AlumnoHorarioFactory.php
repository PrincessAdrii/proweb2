<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AlumnoHorario>
 */
class AlumnoHorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $indice=-1;
        $indice++;
        $aluh = [
            [1,'21430322','AAA'],
            [1,'21430322','AAB'],
            [1,'21430322','AAC'],
            [1,'21430322','AAD'],
            [1,'21430322','AAE'],
            [1,'21430322','AAF'],
            [1,'21430322','AAG'],
            [1,'21430322','AAH'],
            [1,'21430322','AAI'],
            [1,'21430322','AAJ'],
            [1,'21430322','AAK'],
            [1,'21430322','AAL'],
            [1,'21430322','AAM'],
            [1,'21430322','AAN'],
            [1,'21430322','AAO'],
            [1,'21430322','AAP'],
            [1,'21430322','AAQ'],
            [1,'21430322','AAR'],
            [1,'21430322','AAS'],
            [1,'21430322','AAT'],
            [1,'21430322','AAU'],
            [1,'21430322','AAV'],
            [1,'21430322','AAW'],
            [1,'21430322','AAX'],
            [1,'21430322','AAY'],
            [1,'21430322','AAZ'],
            [1,'21430322','ABA'],

            [2,'21430322','ABB'],
            [2,'21430322','ABC'],
            [2,'21430322','ABD'],
            [2,'21430322','ABE'],
            [2,'21430322','ABF'],
            [2,'21430322','ABG'],
            [2,'21430322','ABH'],
            [2,'21430322','ABI'],
            [2,'21430322','ABJ'],
            [2,'21430322','ABK'],
            [2,'21430322','ABL'],
            [2,'21430322','ABM'],
            [2,'21430322','ABN'],
            [2,'21430322','ABO'],
            [2,'21430322','ABP'],
            [2,'21430322','ABQ'],
            [2,'21430322','ABR'],
            [2,'21430322','ABS'],
            [2,'21430322','ABT'],
            [2,'21430322','ABU'],
            [2,'21430322','ABV'],
            [2,'21430322','ABW'],
            [2,'21430322','ABX'],
            [2,'21430322','ABY'],
            [2,'21430322','ABZ'],
            [2,'21430322','ACA'],
            [2,'21430322','ACB'],
            [2,'21430322','ACC'],
        ];
        return [
            'semestre'=>$aluh[$indice][0],
            'noctrl'=>$aluh[$indice][1],
            'idHorarios'=>$aluh[$indice][2]
        ];
    }
}
