<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function registerClubName()
    {
        $user = User::factory()
            ->create([
                'club_name' => null,
            ]);

        $clubName = ['club_name' => 'テストクラブ'];

        $this->actingAs($user);
        $this->patch(route('club-name'), $clubName)
            ->assertStatus(Response::HTTP_FOUND);

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
        $response = $this->patch(route('club-name'), $clubName)
            ->assertStatus(Response::HTTP_FOUND);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
            'name' => $user->name,
            'club_name' => $clubName['club_name']
        ]);
    }

    public function testUpdateClubImage()
    {
        Storage::fake('s3');

        $user = User::factory()->create([]);

        $params = [
            'file' => UploadedFile::fake()->image('test.jpg')
        ];

        $response = $this->actingAs($user)->patch(route('club-image'), $params
        )
            ->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHas('success', 'クラブ画像を更新しました。');
        $filename = $user->id . '_'. now()->format('Y_m_d_H_i_s');
        Storage::disk('s3')->assertExists($filename);
    }
}
