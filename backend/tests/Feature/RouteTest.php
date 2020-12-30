<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
//        $this->seed();
//        $response = $this->get('/')->assertStatus(302);
//        $response = $this->get('/login')->assertOk();
//
//        $user = User::first();
//        $response = $this->actingAs($user);
//
////        $response = $this->get('/users/me')->assertSeeText($user->name)->assertOk();
//
//        $response = $this->get('/users')->assertOk();
//        $response = $this->patch('/users/1')->assertStatus(302);
//
//        $response = $this->get('/players')->assertOk();
//
//        $response = $this->get('/matches/create?opponent_id=3')->assertOk();
//        $response = $this->post('/matches', ['opponent_id' => 3])->assertOk();
//
//        $response = $this->patch('/affiliations/1/regular-change')->assertStatus(302);
//
//        $response = $this->post('/affiliations')->assertStatus(302);
//        $response = $this->patch('/affiliations/1')->assertStatus(302);
    }
}
