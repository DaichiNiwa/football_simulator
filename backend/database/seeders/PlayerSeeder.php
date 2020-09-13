<?php

namespace Database\Seeders;

use App\Models\Player;
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
        ];

        foreach ($players as $player) {
            DB::table('players')->insert($player);
        }
    }
}
