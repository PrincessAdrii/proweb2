<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plaza>
 */
class PlazaFactory extends Factory
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
        $pla = [
            ['E3817','Plaza E3817'],
            ['E3815','Plaza E3815'],
            ['E3717','Plaza E3717'],
            ['E3617','Plaza E3617'],
            ['E3520','Plaza E3520'],
        ];
        return [
            'idPlaza'=>$pla[$indice][0],
            'nombrePlaza'=>$pla[$indice][1],
        ];
        // return [
        //     'idPlaza' => fake()->bothify("???####"),
        //     'nombreplaza' => fake()->jobTitle()
        // ];
    }
}
