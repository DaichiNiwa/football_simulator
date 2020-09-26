<?php

namespace App\Services;

use App\Models\Affiliation;
use App\Models\Outgo;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class AffiliationStoreService
{
    public static function execute(Player $player)
    {
        DB::transaction(
            function () use ($player) {
                Affiliation::store($player);
                Outgo::buyPlayer($player);
            }
        );
    }
}
