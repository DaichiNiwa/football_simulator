<?php

namespace App\Services;

use App\Models\Income;
use App\Models\LoanOption;
use App\Models\LoanRecord;
use App\Models\Outgo;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoanRecordUpdateService
{
    public static function execute(LoanRecord $loanRecord)
    {
        DB::transaction(
            function () use ($loanRecord) {
                $loanRecord->repay();
                Outgo::loan($loanRecord);
            }
        );
    }
}
