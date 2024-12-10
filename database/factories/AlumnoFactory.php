<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Carrera;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
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
        $alum = [
            // ISC
            ['21430322','Santiago Yarik','Andrade','García','M','L21430322@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000001'],
            ['21430360','Israel Emmanuel','Reyna','López','M','L21430360@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000001'],
            ['21430336','Keren Adriana','Escobar','Castilleja','F','L21430336@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000001'],
            ['21430330','Yessica Azeneth','Cervantes','Vara','F','L21430330@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000001'],
            ['21430356','Samuel Alejandro','Perales','Delgado','M','L21430356@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000001'],
            // IE
            ['19430310','Carolina','Acevedo','Ruíz','F','L19430310@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000002'],
            ['19430311','Enrique','Acevedo','Mejía','M','L19430311@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000002'],
            ['19430312','Celina','Acosta','Gómez','F','L19430312@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000002'],
            ['19430313','José','Alcántar','Camacho','M','L19430313@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000002'],
            ['19430314','Roberto','Alvarado','Mendoza','M','L19430314@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000002'],
            // IM
            ['21430230','Daniel','Ramírez','Ortiz','M','L21430230@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000003'],
            ['21430231','Mariana','López','Esquivel','F','L21430231@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000003'],
            ['21430232','Valeria','Morales','Padilla','F','L21430232@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000003'],
            ['21430233','Camila','Torres','Jiménez','F','L21430233@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000003'],
            ['21430234','Leonardo','García','Lozano','M','21430234@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000003'],
            // II
            ['20430300','Cesar','Herrera','Gutierrez','M','L20430300@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000007'],
            ['20430301','Claudio','Acosta','Sosa','M','L20430301@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000007'],
            ['20430302','Nélida','Ruíz','Giménez','F','L20430302@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000007'],
            ['20430303','Norma','Gómez','Fernández','F','L20430303@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000007'],
            ['20430304','Julio','Rodríguez','Romero','M','L20430304@piedrasnegras.tecnm.mx',1, 'AAAAAAA00000007'],
        ];
        return [
            'noctrl'=>$alum[$indice][0],
            'nombre'=>$alum[$indice][1],
            'apellidoP'=>$alum[$indice][2],
            'apellidoM'=>$alum[$indice][3],
            'sexo'=>$alum[$indice][4],
            'email'=>$alum[$indice][5],
            'semestreActual'=>$alum[$indice][6],
            'idCarrera'=>$alum[$indice][7],
        ];
        // return [
        //     'noctrl' => fake()->unique()->bothify("########"),
        //     'nombre' => fake()->name(),
        //     'apellidop' => fake()->lastName(),
        //     'apellidom' => fake()->lastName(),
        //     'sexo' => fake()->randomElement(['M', 'F']),
        //     'carrera_id' => Carrera::factory()
        // ];
    }
}
