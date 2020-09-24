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
                'name' => 'バスチー',
                'country' => 1,
                'attack_level' => 1,
                'defense_level' => 1,
                'is_goalkeeper' => 0,
                'price' => 1,
            ],
            [
                'name' => '阿部マー',
                'country' => 6,
                'attack_level' => 1,
                'defense_level' => 2,
                'is_goalkeeper' => 0,
                'price' => 1,
            ],
            [
                'name' => 'レオナルド',
                'country' => 4,
                'attack_level' => 1,
                'defense_level' => 2,
                'is_goalkeeper' => 0,
                'price' => 1,
            ],
            [
                'name' => 'チャップアップ',
                'country' => 7,
                'attack_level' => 2,
                'defense_level' => 1,
                'is_goalkeeper' => 0,
                'price' => 2,
            ],
            [
                'name' => 'ボール・トモダチー',
                'country' => 2,
                'attack_level' => 1,
                'defense_level' => 1,
                'is_goalkeeper' => 0,
                'price' => 4,
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
                'name' => '金太郎',
                'country' => 1,
                'attack_level' => 1,
                'defense_level' => 2,
                'is_goalkeeper' => 1,
                'price' => 2,
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
                'name' => '結打しん',
                'country' => 1,
                'attack_level' => 1,
                'defense_level' => 2,
                'is_goalkeeper' => 0,
                'price' => 1,
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
                'name' => '四日市しろう',
                'country' => 1,
                'attack_level' => 1,
                'defense_level' => 3,
                'is_goalkeeper' => 0,
                'price' => 3,
            ],
            [
                'name' => 'ジョン・サニー',
                'country' => 2,
                'attack_level' => 3,
                'defense_level' => 2,
                'is_goalkeeper' => 0,
                'price' => 4,
            ],
            [
                'name' => '西川潤',
                'country' => 1,
                'attack_level' => 4,
                'defense_level' => 3,
                'is_goalkeeper' => 0,
                'price' => 6,
            ],
            [
                'name' => '森島司',
                'country' => 1,
                'attack_level' => 5,
                'defense_level' => 2,
                'is_goalkeeper' => 0,
                'price' => 7,
            ],
            [
                'name' => '小川慶治朗',
                'country' => 1,
                'attack_level' => 4,
                'defense_level' => 4,
                'is_goalkeeper' => 0,
                'price' => 4,
            ],
            [
                'name' => '高橋祐治',
                'country' => 1,
                'attack_level' => 3,
                'defense_level' => 5,
                'is_goalkeeper' => 0,
                'price' => 5,
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
                'name' => 'チャナティップ',
                'country' => 7,
                'attack_level' => 7,
                'defense_level' => 4,
                'is_goalkeeper' => 0,
                'price' => 10,
            ],
            [
                'name' => 'ティーラトン',
                'country' => 7,
                'attack_level' => 6,
                'defense_level' => 5,
                'is_goalkeeper' => 0,
                'price' => 8,
            ],
            [
                'name' => '飯倉大樹',
                'country' => 1,
                'attack_level' => 3,
                'defense_level' => 5,
                'is_goalkeeper' => 1,
                'price' => 20,
            ],
            [
                'name' => '権田修一',
                'country' => 1,
                'attack_level' => 4,
                'defense_level' => 6,
                'is_goalkeeper' => 1,
                'price' => 30,
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
                'name' => '室屋成',
                'country' => 1,
                'attack_level' => 7,
                'defense_level' => 8,
                'is_goalkeeper' => 0,
                'price' => 20,
            ],
            [
                'name' => '大島僚太',
                'country' => 1,
                'attack_level' => 9,
                'defense_level' => 7,
                'is_goalkeeper' => 0,
                'price' => 30,
            ],
            [
                'name' => '柿谷曜一朗',
                'country' => 1,
                'attack_level' => 7,
                'defense_level' => 7,
                'is_goalkeeper' => 0,
                'price' => 40,
            ],
            [
                'name' => '南野拓実',
                'country' => 1,
                'attack_level' => 10,
                'defense_level' => 7,
                'is_goalkeeper' => 0,
                'price' => 50,
            ],
            [
                'name' => '本田圭佑',
                'country' => 1,
                'attack_level' => 9,
                'defense_level' => 6,
                'is_goalkeeper' => 0,
                'price' => 60,
            ],
            [
                'name' => '香川真司',
                'country' => 1,
                'attack_level' => 8,
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
            [
                'name' => 'メッシ',
                'country' => 5,
                'attack_level' => 20,
                'defense_level' => 8,
                'is_goalkeeper' => 0,
                'price' => 100,
            ],
            [
                'name' => 'C・ロナウド',
                'country' => 6,
                'attack_level' => 18,
                'defense_level' => 10,
                'is_goalkeeper' => 0,
                'price' => 100,
            ],
            [
                'name' => 'イニエスタ',
                'country' => 2,
                'attack_level' => 18,
                'defense_level' => 8,
                'is_goalkeeper' => 0,
                'price' => 80,
            ],
            [
                'name' => 'ムバッペ',
                'country' => 4,
                'attack_level' => 17,
                'defense_level' => 9,
                'is_goalkeeper' => 0,
                'price' => 80,
            ],
            [
                'name' => 'ポドルスキ',
                'country' => 3,
                'attack_level' => 17,
                'defense_level' => 8,
                'is_goalkeeper' => 0,
                'price' => 70,
            ],
            [
                'name' => 'フェルナンド・トーレス',
                'country' => 2,
                'attack_level' => 19,
                'defense_level' => 11,
                'is_goalkeeper' => 0,
                'price' => 70,
            ],
        ];

        foreach ($players as $player) {
            DB::table('players')->insert($player);
        }
    }
}