<?php

use App\Sopa;
use Illuminate\Database\Seeder;

class SopaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sopa::create([
            'name' => 'Sopa de Arroz',
        ]);
        Sopa::create([
            'name' => 'Sopa de Patacon',
        ]);
        Sopa::create([
            'name' => 'Sancocho de hueso',
        ]);

    }
}
