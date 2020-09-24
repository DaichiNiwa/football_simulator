<?php

namespace App\Services;

use App\Models\Affiliation;
use App\Models\Income;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AffiliationUpdateService
{
    public static function execute(Affiliation $affiliation)
    {
        DB::transaction(
            function () use ($affiliation) {
                $affiliation->is_under_contract = false;
                $affiliation->save();

                Income::SellPlayer($affiliation);
            }
        );
    }
}
