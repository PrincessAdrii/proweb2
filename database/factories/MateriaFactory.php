<?php

namespace Database\Factories;

use App\Models\Reticula;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia>
 */
class MateriaFactory extends Factory
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
        $mat = [
            // ISC
            // 1
            ['AY1','Cálculo Diferencial','Cálc Dif','CD','L','E','Semestre 1',5, 'INTE-DAP-2021-01'],
            ['AY2','Fundamentos de Programación','Fund de Prog','FdP','L','E','Semestre 1',5, 'INTE-DAP-2021-01'],
            ['AY3','Taller de Ética','Tal de Et','TdE','L','E','Semestre 1',4, 'INTE-DAP-2021-01'],
            ['AY4','Matemáticas Discretas','Mat Disc','MaDi','L','E','Semestre 1',5, 'INTE-DAP-2021-01'],
            ['AY5','Taller de Administración','Tal de Adm','TadAd','L','E','Semestre 1',4, 'INTE-DAP-2021-01'],
            ['AY6','Fundamentos de Investigación','Fund de Inv','FudIn','L','E','Semestre 1',4, 'INTE-DAP-2021-01'],

            // 2
            ['AY7','Cálculo Integral','Cálc Int','CI','L','E','Semestre 2',5, 'INTE-DAP-2021-01'],
            ['AY8','Programación Orientada a Objetos','Prog Orient a Obj','POO','L','E','Semestre 2',5, 'INTE-DAP-2021-01'],
            ['AY9','Contabilidad Financiera','Cont Finan','CF','L','E','Semestre 2',4, 'INTE-DAP-2021-01'],
            ['BY1','Química','Quím','Qmc','L','E','Semestre 2',4, 'INTE-DAP-2021-01'],
            ['BY2','Álgebra Lineal','Alg Lin','AlLin','L','E','Semestre 2',5, 'INTE-DAP-2021-01'],
            ['BY3','Probabilidad y Estadística','Prob y Est','PryEst','L','E','Semestre 2',5, 'INTE-DAP-2021-01'],

            // 3
            ['BY4','Cálculo Vectorial','Cálc Vect','CV','L','E','Semestre 3',5, 'INTE-DAP-2021-01'],
            ['BY5','Estructura de Datos','Est de Dat','EdD','L','E','Semestre 3',5, 'INTE-DAP-2021-01'],
            ['CY7','Desarrollo Sustentable','Des Sust','DS','L','E','Semestre 3',5, 'INTE-DAP-2021-01'],
            ['BY7','Investigación de Operaciones','Inv de Oper','IndeOp','L','E','Semestre 3',4, 'INTE-DAP-2021-01'],
            ['BY8','Sistemas Operativos','Sist Oper','SisOpe','L','E','Semestre 3',4, 'INTE-DAP-2021-01'],
            ['BY9','Física General','Fís Gen','FiGe','L','E','Semestre 3',5, 'INTE-DAP-2021-01'],

            // 4
            ['CY1','Ecuaciones Diferenciales','Ec Dif','ED','L','E','Semestre 4',5, 'INTE-DAP-2021-01'],
            ['CY2','Métodos Numéricos','Mét Num','MN','L','E','Semestre 4',4, 'INTE-DAP-2021-01'],
            ['CY3','Tópicos Avanzados de Programación','Top Av de Prog','TAdP','L','E','Semestre 4',5, 'INTE-DAP-2021-01'],
            ['CY4','Fundamentos de Bases de Datos','Fund de BD','FudeBD','L','E','Semestre 4',5, 'INTE-DAP-2021-01'],
            ['CY5','Taller de Sistemas Operativos','Tal de Sis Op','TdeSO','L','E','Semestre 4',4, 'INTE-DAP-2021-01'],
            ['CY6','Principios Eléctricos y Aplicaciones Digitales','Prin Eléc y Ap Dig','PEyAD','L','E','Semestre 4',5, 'INTE-DAP-2021-01'],

            // 5
            ['DY4','Lenguajes y Autómatas I','Leng y Aut I','LyAI','L','E','Semestre 5',5, 'INTE-DAP-2021-01'],
            ['CY8','Fundamentos de Telecomunicaciones','Fund de Tel','FdT','L','E','Semestre 5',4, 'INTE-DAP-2021-01'],
            ['CY9','Taller de Base de Datos','Tal de BD','TdBD','L','E','Semestre 5',4, 'INTE-DAP-2021-01'],
            ['DY1','Simulación','Simul','Sim','L','E','Semestre 5',5, 'INTE-DAP-2021-01'],
            ['DY2','Fundamentos de Ingeniería de Software','Fun de Ing de Sof','FdIdS','L','E','Semestre 5',4, 'INTE-DAP-2021-01'],
            ['DY3','Arquitectura de Computadoras','Arq de Com','AdeC','L','E','Semestre 5',5, 'INTE-DAP-2021-01'],

            // 6
            ['EY1','Lenguajes y Autómatas II','Leng y Aut II','LyAII','L','E','Semestre 6',5, 'INTE-DAP-2021-01'],
            ['DY5','Redes de Computadora','Red de Comp','RdC','L','E','Semestre 6',5, 'INTE-DAP-2021-01'],
            ['DY6','Administración de Bases de Datos','Adm de BD','AdBD','L','E','Semestre 6',5, 'INTE-DAP-2021-01'],
            ['EY9','Programación Web','Prog Web','PrWe','L','E','Semestre 6',5, 'INTE-DAP-2021-01'],
            ['DY8','Ingeniería de Software','Ing de Soft','IndeSo','L','E','Semestre 6',5, 'INTE-DAP-2021-01'],
            ['DY9','Lenguajes de Interfaz','Leng de Int','LedeIn','L','E','Semestre 6',4, 'INTE-DAP-2021-01'],

            // 7
            ['BY6','Cultura Empresarial','Cult Emp','CE','L','E','Semestre 7',5, 'INTE-DAP-2021-01'],
            ['EY2','Conmutación y Enrutamiento de Redes de Datos','Conm y Enr de Red de Dat','CyEdRdD','L','E','Semestre 7',5, 'INTE-DAP-2021-01'],
            ['EY3','Taller de Investigación I','Tal de Inv I','TdII','L','E','Semestre 7',4, 'INTE-DAP-2021-01'],
            ['HY4','Programación Web II','Prog Web II','PrWeII','L','E','Semestre 7',5, 'INTE-DAP-2021-01'],
            ['EY4','Gestión de Proyectos de Software','Ges de Pro de Sof','GdePdeS','L','E','Semestre 7',6, 'INTE-DAP-2021-01'],
            ['HY5','Interfaces Gráficas de Usuario','Int Grá de Usu','IGdeU','L','E','Semestre 7',5, 'INTE-DAP-2021-01'],
            
            // 8
            ['EY6','Programación Lógica y Funcional','Prog Lóg y Func','PLyF','L','E','Semestre 8',4, 'INTE-DAP-2021-01'],
            ['EY7','Administración de Redes','Adm de Red','AdR','L','E','Semestre 8',4, 'INTE-DAP-2021-01'],
            ['EY8','Taller de Investigación II','Tal de Inv II','TdIII','L','E','Semestre 8',4, 'INTE-DAP-2021-01'],
            ['HY6','Programación Móvil con Lenguaje Oficial','Prog Móv c Len Of','PMcLO','L','E','Semestre 8',5, 'INTE-DAP-2021-01'],
            ['EY5','Sistemas Programables','Sist Prog','SiPro','L','E','Semestre 8',4, 'INTE-DAP-2021-01'],
            ['HY7','Base de Datos con ORM','Bas de Dat con ORM','BdDcORM','L','E','Semestre 8',5, 'INTE-DAP-2021-01'],
            ['DY7','Graficación','Graf','Gr','L','E','Semestre 8',4, 'INTE-DAP-2021-01'],

            // 9
            ['FY1','Inteligencia Artificial','Int Art','IA','L','E','Semestre 9',4, 'INTE-DAP-2021-01'],
            ['HY8','Programación Móvil Multiplataforma','Prog Móv Mult','PMM','L','E','Semestre 9',5, 'INTE-DAP-2021-01'],
            ['RYP','Residencia Profesional','Res Prof','RP','L','E','Semestre 9',10, 'INTE-DAP-2021-01'],
            ['SYS','Servicio Social','Serv Soc','SeSo','L','E','Semestre 9',10, 'INTE-DAP-2021-01'],
            ['SYC','Actividades Complementarias','Act Comp','AcCo','L','E','Semestre 9',5, 'INTE-DAP-2021-01'],

            // II
            // 1
            ['AV1','Fundamentos de Investigación','Fund de Inv','FdI','L','E','Semestre 1',4, 'IINE-MAP-2021-02'],
            ['AV4','Taller de Herramientas Intelectuales','Ta de Her Int','TdHI','L','E','Semestre 1',4, 'IINE-MAP-2021-02'],

            // 2
            ['AV7','Electricidad y Electrónica Industrial','Elec y Elect Ind','EyEI','L','E','Semestre 2',4, 'IINE-MAP-2021-02'],
            ['AV8','Propiedad de los Materiales','Prop de los Mat','PdlM','L','E','Semestre 2',4, 'IINE-MAP-2021-02'],

            // 3
            ['BV5','Metrología y Normalización','Metr y Norm','MyN','L','E','Semestre 3',4, 'IINE-MAP-2021-02'],
            ['BV6','Álgebra Lineal','Álg Lin','AL','L','E','Semestre 3',5, 'IINE-MAP-2021-02'],

            // 4
            ['CV2','Procesos de Fabricación','Proc de Fab','PdF','L','E','Semestre 4',4, 'IINE-MAP-2021-02'],
            ['CV3','Física','Fís','F','L','E','Semestre 4',4, 'IINE-MAP-2021-02'],

            // 5
            ['CV9','Administración de Proyectos','Adm de Proy','AdP','L','E','Semestre 5',3, 'IINE-MAP-2021-02'],
            ['DV1','Gestión de Costos','Gest de Cost','GdC','L','E','Semestre 5',4, 'IINE-MAP-2021-02'],

            // 6
            ['DV8','Ingeniería Económica','Ing Eco','IE','L','E','Semestre 6',4, 'IINE-MAP-2021-02'],
            ['DV9','Administración de las Operaciones II','Adm de las Op II','AdlOII','L','E','Semestre 6',4, 'IINE-MAP-2021-02'],

            // 7
            ['EV5','Planeación Financiera','Plan Fin','PF','L','E','Semestre 7',4, 'IINE-MAP-2021-02'],
            ['EV6','Planeación y Diseño de Instalaciones','Plan y Dis de Inst','PyDdI','L','E','Semestre 7',4, 'IINE-MAP-2021-02'],
            
            // 8
            ['FV1','Formulación y Evaluación de Proyectos','Form y Ev de Proy','FyEdP','L','E','Semestre 8',5, 'IINE-MAP-2021-02'],
            ['FV2','Relaciones Industriales','Relac Ind','RI','L','E','Semestre 8',4, 'IINE-MAP-2021-02'],

            // 9
            ['GV6','Emprendimiento e Innocación','Emp e Inn','EI','L','E','Semestre 9',4, 'IINE-MAP-2021-02'],
            ['GV5','Medición y Mejoramiento de la Productividad','Med y Mej de la Prod','MMdlP','L','E','Semestre 9',4, 'IINE-MAP-2021-02'],
        ];
        return [
            'idMateria'=>$mat[$indice][0],
            'nombreMateria'=>$mat[$indice][1],
            'nombreMediano'=>$mat[$indice][2],
            'nombreCorto'=>$mat[$indice][3],
            'nivel'=>$mat[$indice][4],
            'modalidad'=>$mat[$indice][5],
            'semestre'=>$mat[$indice][6],
            'creditos'=>$mat[$indice][7],
            'idReticula'=>$mat[$indice][8],
        ];
    }
}
