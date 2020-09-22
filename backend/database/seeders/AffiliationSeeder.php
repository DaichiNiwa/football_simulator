<?php

namespace Database\Seeders;

use App\Models\Affiliation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AffiliationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $affiliations = [
            //プレイヤー１
            [
                'user_id' => 1,
                'player_id' => 1,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 1,
                'player_id' => 2,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 1,
                'player_id' => 3,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 1,
                'player_id' => 4,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 1,
                'player_id' => 5,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 1,
                'player_id' => 6,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 1,
                'player_id' => 7,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 1,
                'player_id' => 8,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 1,
                'player_id' => 9,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 1,
                'player_id' => 14,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 1,
                'player_id' => 11,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],

            //プレイヤー2
            [
                'user_id' => 2,
                'player_id' => 1,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 2,
                'player_id' => 12,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 2,
                'player_id' => 13,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 2,
                'player_id' => 14,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 2,
                'player_id' => 15,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 2,
                'player_id' => 16,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 2,
                'player_id' => 7,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 2,
                'player_id' => 8,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 2,
                'player_id' => 9,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 2,
                'player_id' => 1,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 2,
                'player_id' => 2,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],


            //プレイヤー３
            [
                'user_id' => 3,
                'player_id' => 21,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 3,
                'player_id' => 22,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 3,
                'player_id' => 23,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 3,
                'player_id' => 24,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 3,
                'player_id' => 25,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 3,
                'player_id' => 6,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 3,
                'player_id' => 17,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 3,
                'player_id' => 18,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 3,
                'player_id' => 29,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 3,
                'player_id' => 20,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 3,
                'player_id' => 15,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],


            //プレイヤー４
            [
                'user_id' => 4,
                'player_id' => 40,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 4,
                'player_id' => 32,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 4,
                'player_id' => 33,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 4,
                'player_id' => 34,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 4,
                'player_id' => 35,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 4,
                'player_id' => 36,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 4,
                'player_id' => 37,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 4,
                'player_id' => 28,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 4,
                'player_id' => 39,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 4,
                'player_id' => 38,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
            [
                'user_id' => 4,
                'player_id' => 41,
                'is_under_contract' => 1,
                'is_regular' => 1,
            ],
        ];

        foreach ($affiliations as $affiliation) {
            DB::table('affiliations')->insert($affiliation);
        }
    }
}
