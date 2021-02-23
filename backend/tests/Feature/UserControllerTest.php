<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function update()
    {
        $user = User::factory()
            ->create([
                'club_name' => null,
            ]);

        $clubName = ['club_name' => 'テストクラブ'];

        $this->actingAs($user);
        $this->patch(route('users.update',['user' => $user]),
            $clubName)
            ->assertStatus(302);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $user->name,
            'club_name' => $clubName['club_name']
        ]);
    }

    /**
     * @test
     * 文字数制限（20文字以内）に引っかかる
     */
    public function update_バリデーションエラー()
    {
        $user = User::factory()
            ->create([
                'club_name' => null,
            ]);

        $clubName = ['club_name' => 'テストのために一生懸命名前を考えて作ったとても愛着のあるクラブ'];

        $this->actingAs($user);
        $response = $this->patch(route('users.update',['user' => $user]),
            $clubName);
        $response->assertStatus(302);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
            'name' => $user->name,
            'club_name' => $clubName['club_name']
        ]);
    }

}
