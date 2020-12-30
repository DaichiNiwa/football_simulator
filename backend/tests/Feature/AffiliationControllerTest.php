<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AffiliationControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStore()
    {
        $user = User::factory()
            ->hasIncomes(1)
            ->create();

        $player = Player::factory()->create();
        $this->actingAs($user);

        $this->post(route('affiliations.store'), ['player_id' => $player->id])
            ->assertStatus(302);

        $this->assertDatabaseHas('affiliations', [
            'user_id' => $user->id,
            'player_id' => $player->id,
            'is_under_contract' => 1,
            'is_regular' => 0
        ]);
    }

}
