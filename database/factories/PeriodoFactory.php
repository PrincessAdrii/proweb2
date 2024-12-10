<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periodo>
 */
class PeriodoFactory extends Factory
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
        $per = [
            ['E-J24','Ene-Jun 24','E-J24','2024-01-20','2024-06-23'],
            ['A-D24','Ago-Dic 24','A-D24','2024-08-21','2024-12-24'],
            ['E-J25','Ene-Jun 25','E-J25','2025-01-22','2025-06-25'],
            ['A-D25','Ago_Dic 25','A-D25','2025-08-23','2025-12-26'],
            ['E-J26','Ene-Jun 26','E-J26','2026-01-24','2026-06-28'],
            ['A-D26','Ago_Dic 26','A-D26','2026-08-25','2026-12-29'],
            ['E-J27','Ene-Jun 27','E-J27','2027-01-26','2027-06-30'],
        ];
        return [
            'idPeriodo'=>$per[$indice][0],
            'periodo'=>$per[$indice][1],
            'descCorta'=>$per[$indice][2],
            'fechaIni'=>$per[$indice][3],
            'fechaFin'=>$per[$indice][4],
        ];

        // $p = fake()->randomElement($array = array ('ENE-JUN','AGO-DIC'));
        // $a = fake()->numberBetween($min = 2000, $max = 2024);
        // $descCorta = substr($p, 0, 1) . substr($p, 3, 2) . ' ' . $a;
        // return [
        //     'idPeriodo' => fake()->unique()->bothify("???##"),
        //     'periodo' => $p.' '.$a, // ver fakers
        //     'descCorta' => $descCorta, // ver fakers
        //     'fechaIni' => fake()->date($format = 'Y-m-d', $max = 'now'), // ver fakers
        //     'fechaFin' => fake()->date($format = 'Y-m-d', $max = 'now') // ver fakers
        // ];
    }
}
