<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $players = [
            [
                'name' => '山田太郎',
                'country' => 1,
                'attack_level' => 1,
                'defense_level' => 1,
                'is_goalkeeper' => 0,
                'price' => 1,
            ],
            [
                'name' => '田中一太郎',
                'country' => 1,
                'attack_level' => 1,
                'defense_level' => 1,
                'is_goalkeeper' => 0,
                'price' => 1,
            ],
            [
                'name' => '田中次郎',
                'country' => 1,
                'attack_level' => 1,
                'defense_level' => 1,
                'is_goalkeeper' => 0,
                'price' => 1,
            ],
            [
                'name' => '中田三郎',
                'country' => 1,
                'attack_level' => 1,
                'defense_level' => 1,
                'is_goalkeeper' => 0,
                'price' => 1,
            ],
            [
                'name' => '田中四郎',
                'country' => 1,
                'attack_level' => 1,
                'defense_level' => 1,
                'is_goalkeeper' => 1,
                'price' => 1,
            ],
            [
                'name' => '冗太郎',
                'country' => 1,
                'attack_level' => 2,
                'defense_level' => 1,
                'is_goalkeeper' => 1,
                'price' => 2,
            ],
            [
                'name' => '鳥羽はいじ',
                'country' => 1,
                'attack_level' => 2,
                'defense_level' => 2,
                'is_goalkeeper' => 0,
                'price' => 3,
            ],
            [
                'name' => 'トマット・マイケル',
                'country' => 0,
                'attack_level' => 1,
                'defense_level' => 2,
                'is_goalkeeper' => 0,
                'price' => 2,
            ],
            [
                'name' => 'クルト・ワマイケル',
                'country' => 6,
                'attack_level' => 3,
                'defense_level' => 2,
                'is_goalkeeper' => 0,
                'price' => 4,
            ],
            [
                'name' => 'ノイアー',
                'country' => 3,
                'attack_level' => 3,
                'defense_level' => 10,
                'is_goalkeeper' => 1,
                'price' => 80,
            ],
            [
                'name' => 'クルトワ',
                'country' => 8,
                'attack_level' => 2,
                'defense_level' => 10,
                'is_goalkeeper' => 1,
                'price' => 70,
            ],
            [
                'name' => '本田圭佑',
                'country' => 1,
                'attack_level' => 7,
                'defense_level' => 6,
                'is_goalkeeper' => 0,
                'price' => 60,
            ],
            [
                'name' => '香川真司',
                'country' => 1,
                'attack_level' => 6,
                'defense_level' => 7,
                'is_goalkeeper' => 0,
                'price' => 60,
            ],
            [
                'name' => '久保建英',
                'country' => 1,
                'attack_level' => 7,
                'defense_level' => 5,
                'is_goalkeeper' => 0,
                'price' => 50,
            ],
        ];

        foreach ($players as $player) {
            DB::table('players')->insert($player);
        }
    }
}
