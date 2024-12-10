<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grupo>
 */
class GrupoFactory extends Factory
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
        $grup = [
            ['AAA','GM1','2024-08-01','desc',20,'A-D24','AY1','B3'],
            ['AAB','GM1','2024-08-01','desc',20,'A-D24','AY2','B2'],
            ['AAC','GM1','2024-08-01','desc',20,'A-D24','AY3','A1'],
            ['AAD','GM1','2024-08-01','desc',20,'A-D24','AY4','A2'],
            ['AAE','GM1','2024-08-01','desc',20,'A-D24','AY5','A8'],
            ['AAF','GM1','2024-08-01','desc',20,'A-D24','AY6','A9'],
            ['AAG','GM1','2025-01-01','desc',20,'E-J25','AY7','B4'],
            ['AAH','GM1','2025-01-01','desc',20,'E-J25','AY8','B1'],
            ['AAI','GM1','2025-01-01','desc',20,'E-J25','AY9','A4'],
            ['AAJ','GM1','2025-01-01','desc',20,'E-J25','BY1','A5'],
            ['AAK','GM1','2025-01-01','desc',20,'E-J25','BY2','A6'],
            ['AAL','GM1','2025-01-01','desc',20,'E-J25','BY3','A7'],
        ];
        return [
            'idGrupo'=>$grup[$indice][0],
            'grupo'=>$grup[$indice][1],
            'fecha'=>$grup[$indice][2],
            'descripcion'=>$grup[$indice][3],
            'maxAlumnos'=>$grup[$indice][4],
            'idPeriodo'=>$grup[$indice][5],
            'idMateria'=>$grup[$indice][6],
            'idPersonal'=>$grup[$indice][7],
        ];
    }
}
