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
        ];

        foreach ($affiliations as $affiliation) {
            DB::table('affiliations')->insert($affiliation);
        }
    }
}
