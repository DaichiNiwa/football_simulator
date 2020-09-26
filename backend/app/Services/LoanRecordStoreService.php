<?php

namespace App\Services;

use App\Models\Income;
use App\Models\LoanOption;
use App\Models\LoanRecord;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoanRecordStoreService
{
    public static function execute(User $user, LoanOption $loanOption)
    {
        DB::transaction(
            function () use ($user, $loanOption) {
                $loanRecord = LoanRecord::store($user, $loanOption);
                Income::loan($user, $loanOption, $loanRecord);
            }
        );
    }
}
