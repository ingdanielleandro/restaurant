<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'proteinas',
            'principios',
            'sopas',
            'ejecutivos',
            'adicionales',
        ]);
        $this->call([
            ProteinaTableSeeder::class,
            PrincipioTableSeeder::class,
            SopaTableSeeder::class,
            EjecutivoTableSeeder::class,
            AdicionalTableSeeder::class,
            ]);

    $this->call(CorrienteTableSeeder::class);
    $this->call(AlmuerzoTableSeeder::class);

    }
    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table){
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
