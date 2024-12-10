<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GrupoHorario>
 */
class GrupoHorarioFactory extends Factory
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
        $gruph = [
            ['AAA','Lunes',8,'AAA','1C'],
            ['AAB','Martes',8,'AAA','1C'],
            ['AAC','Miércoles',8,'AAA','1B'],
            ['AAD','Jueves',8,'AAA','1C'],
            ['AAE','Viernes',8,'AAA','1C'],

            ['AAF','Lunes',9,'AAB','1A'],
            ['AAG','Martes',9,'AAB','1A'],
            ['AAH','Miércoles',9,'AAB','1A'],
            ['AAI','Jueves',9,'AAB','1A'],
            ['AAJ','Viernes',9,'AAB','1A'],

            ['AAK','Lunes',10,'AAC','1C'],
            ['AAL','Martes',10,'AAC','1C'],
            ['AAM','Miércoles',10,'AAC','1B'],
            ['AAN','Jueves',10,'AAC','1C'],

            ['AAO','Lunes',11,'AAD','3B'],
            ['AAP','Martes',11,'AAD','3B'],
            ['AAQ','Miércoles',11,'AAD','3B'],
            ['AAR','Jueves',11,'AAD','3B'],
            ['AAS','Viernes',11,'AAD','3B'],

            ['AAT','Lunes',12,'AAE','1C'],
            ['AAU','Martes',12,'AAE','1C'],
            ['AAV','Miércoles',12,'AAE','1B'],
            ['AAW','Viernes',12,'AAE','1C'],

            ['AAX','Martes',13,'AAF','1A'],
            ['AAY','Miércoles',13,'AAF','1A'],
            ['AAZ','Jueves',13,'AAF','1A'],
            ['ABA','Viernes',13,'AAF','1A'],

            // 
            ['ABB','Lunes',9,'AAG','1C'],
            ['ABC','Martes',9,'AAG','1C'],
            ['ABD','Miércoles',9,'AAG','1C'],
            ['ABE','Jueves',9,'AAG','1C'],
            ['ABF','Viernes',9,'AAG','1C'],

            ['ABG','Lunes',12,'AAH','3B'],
            ['ABH','Martes',12,'AAH','3B'],
            ['ABI','Miércoles',12,'AAH','3B'],
            ['ABJ','Jueves',12,'AAH','3B'],
            ['ABK','Viernes',12,'AAH','3B'],

            ['ABL','Lunes',8,'AAI','2A'],
            ['ABM','Miércoles',8,'AAI','2A'],
            ['ABN','Jueves',8,'AAI','2A'],
            ['ABO','Viernes',8,'AAI','2A'],

            ['ABP','Lunes',10,'AAJ','4A'],
            ['ABQ','Martes',10,'AAJ','4A'],
            ['ABR','Miércoles',10,'AAJ','4A'],
            ['ABS','Jueves',10,'AAJ','4A'],

            ['ABT','Lunes',13,'AAK','2A'],
            ['ABU','Martes',13,'AAK','2A'],
            ['ABV','Miércoles',13,'AAK','2A'],
            ['ABW','Jueves',13,'AAK','2A'],
            ['ABX','Viernes',13,'AAK','2A'],

            ['ABY','Lunes',11,'AAL','4A'],
            ['ABZ','Martes',11,'AAL','4A'],
            ['ACA','Miércoles',11,'AAL','4A'],
            ['ACB','Jueves',11,'AAL','4A'],
            ['ACC','Viernes',11,'AAL','4A'],
        ];
        return [
            'idHorarios'=>$gruph[$indice][0],
            'dia'=>$gruph[$indice][1],
            'hora'=>$gruph[$indice][2],
            'idGrupo'=>$gruph[$indice][3],
            'idLugar'=>$gruph[$indice][4],
        ];
    }
}
