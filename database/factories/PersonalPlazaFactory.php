<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonalPlaza>
 */
class PersonalPlazaFactory extends Factory
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
            ['A1', 'E3817', 10],
        ];
        return [
            'idPersonal'=>$ret[$indice][0],
            'idPlaza'=>$ret[$indice][1],
            'tipoNombramiento'=>$ret[$indice][2],
        ];
    }
}
