<?php
use App\Corriente;
use App\Proteina;
use App\Principio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorrienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proteinaId = Proteina::find(1);
        $principioId = Principio::find(2);

        Corriente::create([
            'proteinas_id' => $proteinaId->id,
            'principios_id' => $principioId->id,

        ]);
        $proteinaId2 = Proteina::find(2);
        $principioId2 = Principio::find(3);

        Corriente::create([
            'proteinas_id' => $proteinaId2->id,
            'principios_id' => $principioId2->id,

        ]);
    }
}
