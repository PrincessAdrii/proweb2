<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hora>
 */
class HoraFactory extends Factory
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
        $hor = [
            ['1A', '07:00','08:00'],
            ['2A', '08:00','09:00'],
            ['3A', '09:00','10:00'],
            ['4A', '10:00','11:00'],
            ['5A', '11:00','12:00'],
            ['6A', '12:00','13:00'],
            ['7A', '13:00','14:00'],
            ['8A', '14:00','15:00'],
            ['9A', '15:00','16:00'],
            ['1B', '16:00','17:00'],
        ];
        return [
            'idHora'=>$hor[$indice][0],
            'horaIni'=>$hor[$indice][1],
            'horaFin'=>$hor[$indice][2],
        ];
    }
}
