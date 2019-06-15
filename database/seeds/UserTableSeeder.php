<?php
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'administrador',
            'username' => 'admin',
            'email' => 'ingdanielleandro@gmail.com',
            'password' => bcrypt('0000'),
        ]);
    }
}
