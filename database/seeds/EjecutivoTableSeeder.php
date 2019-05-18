<?php

use App\Ejecutivo;
use Illuminate\Database\Seeder;

class EjecutivoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ejecutivo::create([
            'name' => 'Pechuga especial',
            'precio' => 8000,
        ]);
        Ejecutivo::create([
            'name' => 'Lengua en salsa',
            'precio' => 10000,
        ]);
        Ejecutivo::create([
            'name' => 'Mojarra frita',
            'precio' => 8000,
        ]);
    }
}
