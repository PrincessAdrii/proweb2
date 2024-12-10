<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin_usuario>
 */
class AdminUsuarioFactory extends Factory
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
            ['admin','admin'],
        ];
        return [
            'username'=>$dep[$indice][0],
            'password'=>$dep[$indice][1],
        ];
    }
}
