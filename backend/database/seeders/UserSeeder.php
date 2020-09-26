<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => 'テスト太郎',
                'email' => 'test@test.com',
                'email_verified_at' => now(),
                'club_name' => 'テストクラブ１',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

        User::factory()
            ->times(3)
            ->create();
    }
}
