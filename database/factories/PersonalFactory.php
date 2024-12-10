<?php

namespace Database\Factories;

use App\Models\Depto;
use App\Models\Puesto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personal>
 */
class PersonalFactory extends Factory
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
        $per = [
            // ISC
            ['A1','MORA841015H12','Roberto','Espinoza','Torres','Licenciatura en Ingeniería en Sistemas Computacionales',1,null,0,null,0,null,0,'1995-04-20','1995-04-20', 'A3', '1'],
            ['A2','GARC920320M9L','Flor de María','Rivera','Sánchez','Licenciatura en Ciencias de la Computación',1,null,0,null,0,null,0,'2004-11-14','2004-11-14', 'A3', '1'],
            ['A3','RODR750506H6P','Antonio','Chávez','Soto',null,0,'Especialización en Ciberseguridad y Redes',1,null,0,null,0,'2000-03-21','2000-03-21', 'A3', '1'],
            ['A4','LOPE870912M3K','Pedro','Cruz','Vázquez',null,0,'Especialización en Desarrollo de Aplicaciones Móviles',1,null,0,null,0,'2009-01-12','2009-01-12', 'A3', '1'],
            ['A5','SANC660819H8Q','Juan Ramón','Olague','Sánchez',null,0,null,0,'Maestría en Ciencias de Datos e Inteligencia Artificial',1,null,0,'2013-05-05','2013-05-05', 'A3', '1'],
            ['A6','GOME940101M1S','Hilda Patricia','Beltrán','Hernández',null,0,null,0,'Maestría en Ingeniería de Software',1,null,0,'2008-02-20','2008-02-20', 'A3', '1'],
            ['A7','HERN820711H7B','Aquiles','González','Ramos',null,0,null,0,null,0,'Doctorado en Computación Cuántica',1,'1996-07-07','1996-07-07', 'A3', '1'],
            ['A8','MART760205M2J','Isidro','García','Sierra',null,0,null,0,null,0,'Doctorado en Ingeniería de Sistemas Complejos',1,'2011-09-22','2011-09-22', 'A3', '1'],
            ['A9','CRUZ990619H4F','Héctor Carlos','Valadez','Moyeda','Licenciatura en Ingeniería en Tecnologías de la Información',1,null,0,null,0,null,0,'2002-10-03','2002-10-03', 'A3', '1'],
            ['B1','PERE830315M5T','David Sergio','Castillón','Domínguez',null,0,null,0,'Maestría en Arquitectura de Computadoras y Sistemas Embebidos',1,null,0,'2007-06-16','2007-06-16', 'A3', '1'],

            // Director
            ['B2','NAVA900823H5Z','Gustavo Emilio','Rojo','Velázquez',null,0,null,0,null,0,'Doctorado en Ingeniería de Sistemas Complejos',1,'2002-06-13','2002-06-13', 'A1', '2'],

            // Subdirectores
            ['B3','SALD780104M3X','Carlos','Patiño','Chávez','Licenciatura en Seguridad Informática y Tecnologías de la Información',1,null,0,null,0,null,0,'2007-03-22','2007-03-22', 'A2', '3'],
            ['B4','OLIV850927H2Y','José Carlos','Hernández','Lozano',null,0,null,0,null,0,'Doctorado en Inteligencia Artificial y Computación Cognitiva',1,'1999-10-21','1999-10-21', 'A2', '4'],
        ];
        return [
            'idPersonal'=>$per[$indice][0],
            'RFC'=>$per[$indice][1],
            'nombre'=>$per[$indice][2],
            'apellidoP'=>$per[$indice][3],
            'apellidoM'=>$per[$indice][4],
            'licenciatura'=>$per[$indice][5],
            'lictit'=>$per[$indice][6],
            'especializacion'=>$per[$indice][7],
            'esptit'=>$per[$indice][8],
            'maestria'=>$per[$indice][9],
            'maetit'=>$per[$indice][10],
            'doctorado'=>$per[$indice][11],
            'doctit'=>$per[$indice][12],
            'fechaIngSep'=>$per[$indice][13],
            'fechaIngIns'=>$per[$indice][14],
            'idDepto'=>$per[$indice][15],
            'idPuesto'=>$per[$indice][16],
        ];
        // return [
        //     // 'noTrabajador' => fake()->unique()->bothify("####"),
        //     'RFC' => fake()->unique()->bothify("????#######?#"),
        //     'nombres' => fake()->name(),
        //     'apellidoP' => fake()->lastName(),
        //     'apellidoM' => fake()->lastName(),
        //     'licenciatura' => fake()->jobTitle(),
        //     'licPasTit' => fake()->bothify("?"),
        //     'especializacion' => fake()->jobTitle(),
        //     'espPasTit' => fake()->bothify("?"),
        //     'maestria' => fake()->jobTitle(),
        //     'maePasTit' => fake()->bothify("?"),
        //     'doctorado' => fake()->jobTitle(),
        //     'docPasTit' => fake()->bothify("?"),
        //     'fechaIngSep' => fake()->date($format = 'Y-m-d', $max = 'now'), // ver fakers
        //     'fechaIngIns' => fake()->date($format = 'Y-m-d', $max = 'now'), // ver fakers
        //     'depto_id' => Depto::factory(),
        //     'puesto_id' => Puesto::factory(),
        // ];
    }
}
