<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Depto>
 */
class DeptoFactory extends Factory
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
        $dep = [
            ['A1','Dirección','Direcc','D'],
            ['A2','Subdirección','Subdirecc','SD'],
            ['A3','Ingeniería en Sistemas Computacionales','Ing Sist Comp','ISC'],
            ['A4','Ingeniería Electrónica','Ing Elect','IE'],
            ['A5','Ingeniería Mecánica','Ing Meca','IM'],
            ['A6','Ingeniería Mecatrónica','Ing Mecat','IME'],
            ['A7','Contador Público','Cont Pub','CP'],
            ['A8','Ingeniería en Gestión Empresarial','Ing Gest Emp','IGE'],
            ['A9','Ingeniería Industrial','Ing Ind','II'],
            ['B1','Ciencias Básicas','Cien Bas','CB'],
        ];
        return [
            'idDepto'=>$dep[$indice][0],
            'nombreDepto'=>$dep[$indice][1],
            'nombreMediano'=>$dep[$indice][2],
            'nombreCorto'=>$dep[$indice][3],
        ];

        // $titulo = fake()->unique()->jobTitle();
        // return [
        //     'idDepto' => fake()->unique()->bothify("?#"),
        //     'nombreDepto' => $titulo,
        //     'nombreMediano' => substr($titulo,0,10), 
        //     'nombreCorto' => substr($titulo,0,5)
        // ];
    }
}
