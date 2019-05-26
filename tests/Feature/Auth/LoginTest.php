<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function prueba_ver_formulario_login()
    {
        $this->withoutExceptionHandling();
        $this->get('/login')
            ->assertOk()
            ->assertViewIs('auth.login');
    }
        /**
     * A basic feature test example.
     *
     * @test
     */
    public function prueba_usuario_no_puede_ver_formulario_login()
    {
        $user = factory(User::class)->make();
        $this->actingAs($user)->get('/login')
            ->assertRedirect('/home');
    }
            /**
     * A basic feature test example.
     *
     * @test
     */
    public function prueba_usuario_con_credenciales_incorrectas()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);
        $this->post('/login', [
            'username' => $user->username,
            'password' => $password,
        ])
        ->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

}
