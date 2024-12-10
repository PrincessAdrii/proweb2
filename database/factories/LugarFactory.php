<?php

namespace Database\Factories;

use App\Models\Edificio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lugar>
 */
class LugarFactory extends Factory
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
        $lug = [
            // Sistemas
            ['1A', 'Laboratorio de Cómputo C','LCC', '3A'],
            ['2A', 'Laboratorio de Cómputo D','LCD', '3A'],
            ['3A', 'Laboratorio de Cómputo E','LCE', '3A'],
            ['4A', 'Laboratorio de Cómputo F','LCF', '3A'],
            ['5A', 'Sala Valerdi','LCV', '3A'],

            // K
            ['6A', 'Salón 1K','1K', '2A'],
            ['7A', 'Salón 2K','2K', '2A'],
            ['8A', 'Salón 3K','3K', '2A'],
            ['9A', 'Salón 4K','4K', '2A'],
            ['1B', 'Salón 5K','5K', '2A'],
            ['2B', 'Salón 6K','6K', '2A'],
            ['3B', 'Salón 7K','7K', '2A'],
            ['4B', 'Salón 8K','8K', '2A'],
            ['5B', 'Salón 9K','9K', '2A'],
            ['6B', 'Salón 10K','10K', '2A'],
            ['7B', 'Salón 11K','11K', '2A'],
            ['8B', 'Salón 12K','12K', '2A'],
            ['9B', 'Salón 13K','13K', '2A'],
            ['1C', 'Salón 14K','14K', '2A'],

            // D
            ['2C', 'Salón 1D','1D', '6A'],
            ['3C', 'Salón 2D','2D', '6A'],
            ['4C', 'Salón 3D','3D', '6A'],
            ['5C', 'Salón 4D','4D', '6A'],
            ['6C', 'Salón 5D','5D', '6A'],
            ['7C', 'Salón 6D','6D', '6A'],
            ['8C', 'Salón 7D','7D', '6A'],
        ];
        return [
            'idLugar'=>$lug[$indice][0],
            'nombreLugar'=>$lug[$indice][1],
            'nombreCorto'=>$lug[$indice][2],
            'idEdificio'=>$lug[$indice][3],
        ];
        // $l1 = fake()->randomElement($array = array ('Sala','Laboratorio'));
        // $l2 = fake()->numberBetween($min = 1, $max = 99);
        // return [
        //     'idLugar' => fake()->unique()->bothify("####"),
        //     'nombreLugar' => $l1.' '.$l2,
        //     'edificio_id' => Edificio::factory(),
        // ];
    }
}
