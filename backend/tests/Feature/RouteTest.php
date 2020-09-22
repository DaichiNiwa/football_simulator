<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRouting()
    {
        $this->seed();
        $response = $this->get('/')->assertStatus(302);
        $response = $this->get('/login')->assertOk();

        $user = User::find(1);
        $response = $this->actingAs($user);

        $response = $this->get('/users/me')->assertSeeText('テスト太郎')->assertOk();

        $response = $this->get('/users')->assertOk();
        $response = $this->patch('/users/1')->assertStatus(302);

        $response = $this->get('/players')->assertOk();

        $response = $this->patch('/affiliations/1/regular-change')->assertStatus(302);

        $response = $this->post('/affiliations')->assertStatus(302);
//        $response = $this->patch('/affiliations/1')->assertOk();

        $response = $this->get('/matches/create?opponent_id=2')->assertOk();
//        $response = $this->post('/matches', ['opponent_id' => 2])->assertOk();

    }
}
