<?php

namespace Tests\Feature;

use App\Models\Affiliation;
use App\Models\LoanOption;
use App\Models\LoanRecord;
use App\Models\Player;
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
        $this->seed();
        $this->get('/')->assertStatus(302);
        $this->get('/login')->assertOk();

        $user = User::find(1);
        $this->actingAs($user);

        $this->get(route('me'))->assertSeeText('テスト太郎')->assertOk();

        $this->get(route('users.index'))->assertOk();
        $this->patch(route('users.update', ['user' => $user]),
            ['club_name' => 'hoge']
        )->assertStatus(302);

        $this->get(route('players.index'))->assertOk();

        $opponent = User::find(2);
        $this->get(route('matches.create', ['opponent_id' => $opponent->id]))->assertOk();
        $this->post(route('matches.store'), ['opponent_id' => $opponent->id])->assertOk();

        $affiliation = Affiliation::find(1);
        $this->patch(route('changeIsRegular', ['affiliation' => $affiliation]))->assertStatus(302);

        $player = Player::find(1);
        $this->post(route('affiliations.store'), ['player_id' => $player->id])->assertStatus(302);
        $this->patch(route('affiliations.update', ['affiliation' => $affiliation]))->assertStatus(302);

        $this->get(route('loans.index'))->assertOk();

        $loan_option = LoanOption::find(1);
        $this->post(route('loan-records.store'), ['loan_option_id' => $loan_option->id])->assertStatus(302);
        $loan_record = LoanRecord::find(1);
        $this->patch(route('loan-records.update', ['loan_record' => $loan_record]))->assertStatus(302);
    }
}
