<?php

use App\Almuerzo;
use App\Corriente;
use App\Ejecutivo;
use App\Adicional;
use App\Sopa;
use Illuminate\Database\Seeder;

class AlmuerzoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $corrienteId = Corriente::findOrFail(1);
        // $ejecutivoId = Ejecutivo::findOrFail(1);
        // $adiconalId = Adicional::findOrFail(1);
        // $sopaId = Sopa::findOrFail(1);

        // Almuerzo::create([
        //     'corrientes_id' => $corrienteId->id,
        //     'ejecutivos_id' => $ejecutivoId->id,
        //     'adicionales_id' => $adiconalId->id,
        //     'sopas_id' => $sopaId->id,
        //     'arroz' => true,
        //     'ensalada' => true,
        //     'precio' => 25000,
        // ]);
    }
}
