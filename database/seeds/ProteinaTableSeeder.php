<?php

use App\Proteina;
use Illuminate\Database\Seeder;

class ProteinaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proteina::create([
            'name' => 'Carne a la plancha',
        ]);
        Proteina::create([
            'name' => 'Pechuga a la plancha',
        ]);
        Proteina::create([
            'name' => 'Pollo sudado',
        ]);

        factory(Proteina::class, 10)->create();
    }
}
