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
        $users = [
            [
                'name' => 'テスト太郎',
                'email' => 'test@test.com',
                'email_verified_at' => now(),
                'club_name' => 'テストクラブ１',
                'club_image' => '1_2021_02_28_12_05_15',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => '大鳥マルエ',
                'email' => 'test2@test.com',
                'email_verified_at' => now(),
                'club_name' => '目黒不動前サッカークラブ',
                'club_image' => '1_2021_02_28_12_05_23',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => '江戸川コモディー',
                'email' => 'test3@test.com',
                'email_verified_at' => now(),
                'club_name' => 'FC水道',
                'club_image' => '1_2021_02_28_12_05_37',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'John Lemon',
                'email' => 'test4@test.com',
                'email_verified_at' => now(),
                'club_name' => 'NY Strawberry Fields',
                'club_image' => '1_2021_02_28_12_05_42',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
