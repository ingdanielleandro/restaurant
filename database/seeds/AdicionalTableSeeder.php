<?php

use App\Adicional;
use Illuminate\Database\Seeder;

class AdicionalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adicional::create([
            'name' => 'Porcion de papas fritas',
            'cantidad' => 1,
            'precio' => 3000,
        ]);
        Adicional::create([
            'name' => 'Porcion de principio',
            'cantidad' => 1,
            'precio' => 2500,
        ]);
        Adicional::create([
            'name' => 'Porcion de arroz',
            'cantidad' => 1,
            'precio' => 1000,
        ]);
    }
}
