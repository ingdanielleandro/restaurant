<?php

use App\Principio;
use Illuminate\Database\Seeder;

class PrincipioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Principio::create([
            'name' => 'Frijol',
        ]);
        Principio::create([
            'name' => 'Arveja',
        ]);
        Principio::create([
            'name' => 'Coliflor',
        ]);
    }
}
