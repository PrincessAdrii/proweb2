<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Edificio>
 */
class EdificioFactory extends Factory
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
        $edi = [
            ['1A', 'Ciencias Básicas','CB'],
            ['2A', 'Edificio K','Ed K'],
            ['3A', 'Sistemas y Computación','SC'],
            ['4A', 'Laboratorio de Electrónica','Lab E'],
            ['5A', 'Edificio H','Ed H'],
            ['6A', 'Edificio D','Ed D'],
        ];
        return [
            'idEdificio'=>$edi[$indice][0],
            'nombreEdificio'=>$edi[$indice][1],
            'nombreCorto'=>$edi[$indice][2],
        ];
        // return [
        //     'idEdificio' => fake()->unique()->bothify("####"),
        //     'nombreEdificio' => fake()->unique()->jobTitle(),
        // ];
    }
}
