<?php

namespace Database\Factories;

use App\Models\Carrera;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reticula>
 */
class ReticulaFactory extends Factory
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
        $ret = [
            ['INTE-DAP-2021-01','Especialidad en Desarrollo de Aplicaciones','2021-03-01', 'AAAAAAA00000001'], // ISC
            ['IELE-ATC-2018-01','Especialidad en Automatización y Control','2021-03-02', 'AAAAAAA00000002'],
            ['IMEC-2010-228','Especialidad en...','2021-03-03', 'AAAAAAA00000003'],
            ['IMCE-ATO-2018-01','Especialidad en Automatización y Control','2021-03-04', 'AAAAAAA00000004'],
            ['IINE-MAP-2021-01','Especialidad en Manufactura y Productividad','2021-03-05', 'AAAAAAA00000005'],
            ['IGEE-RHU-2021-01','Especialidad en Recursos Humanos','2021-03-06', 'AAAAAAA00000007'],
            ['IINE-MAP-2021-02','Especialidad en Manufactura y Productividad','2021-03-07', 'AAAAAAA00000008'] // II
        ];
        return [
            'idReticula'=>$ret[$indice][0],
            'descripcion'=>$ret[$indice][1],
            'fechaEnVigor'=>$ret[$indice][2],
            'idCarrera'=>$ret[$indice][3],
        ];
        // $titulo = fake()->unique()->jobTitle();
        // return [
        //     'idReticula' => fake()->unique()->bothify("???????########"),
        //     'descripcion' => fake()->text($maxNbChars = 200), // ver fakers
        //     'fechaEnVigor' => fake()->date($format = 'Y-m-d', $max = 'now'), // ver fakers
        //     'carrera_id' => Carrera::factory()
        // ];
    }
}
