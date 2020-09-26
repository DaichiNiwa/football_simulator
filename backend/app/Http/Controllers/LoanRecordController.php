<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRecordStoreRequest;
use App\Models\LoanOption;
use App\Models\LoanRecord;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoanRecordController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  LoanRecordStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(LoanRecordStoreRequest $request)
    {
        $user = Auth::user();

        if ($user->hasUnpaidLoan()) {
            return back()->with('error', 'すでにローンを借りているため、新たに借りることができません。');
        }

        $loanOptionId = $request->get('loan_option_id');
        $loanOption = LoanOption::find($loanOptionId);

        $loanRecordStoreService = app('App\Services\LoanRecordStoreService');
        $loanRecordStoreService::execute($user, $loanOption);

        return back()->with('success', 'ローンを借りました。');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LoanRecord $loanRecord
     * @return RedirectResponse
     */
    public function update(LoanRecord $loanRecord)
    {
        if(!$loanRecord->canRepay()) {
            return back()->with('error', 'このローンは返済できません。');
        }

        $loanRecordUpdateService = app('App\Services\LoanRecordUpdateService');
        $loanRecordUpdateService::execute($loanRecord);

        return back()->with('success', 'ローンを返済しました。');

    }
}
