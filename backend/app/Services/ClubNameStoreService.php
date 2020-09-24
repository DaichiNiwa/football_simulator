<?php

namespace App\Services;

use App\Models\Income;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ClubNameStoreService
{
    public static function execute(User $user, string $club_name)
    {
        DB::transaction(
            function () use ($user, $club_name) {
                $user->club_name = $club_name;
                $user->save();

                Income::winInitialBonus();
            }
        );
    }
}
