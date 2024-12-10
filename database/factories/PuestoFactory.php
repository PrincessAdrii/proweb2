<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Puesto>
 */
class PuestoFactory extends Factory
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
        $pue = [
            ['1','Docente','Docente'],

            ['2','Director','Dirección'],
            ['3','Subdirector académico','Dirección'],
            ['4','Subdirector de plantación','Dirección'],

            ['5','Auxiliar de Laboratorio','Auxiliar'],
            ['6','Auxiliar de Biblioteca','Auxiliar'],
            ['7','Auxiliar de Taller','Auxiliar'],

            ['8','Jefe de Recursos Humanos','Administrativo'],
            ['9','Jefe Académico','Administrativo'],
            ['10','Jefe División de Estudios','Administrativo'],
        ];
        return [
            'idPuesto'=>$pue[$indice][0],
            'nombrePuesto'=>$pue[$indice][1],
            'tipo'=>$pue[$indice][2],
        ];
        // $tipos = array('Docente', 'Director', 'Administrativo');
        // return [
        //     'idPuesto' => fake()->bothify("???####"),
        //     'nombre' => fake()->jobTitle(),
        //     'tipo' => fake()->randomElement($tipos)
        // ];
    }
}
