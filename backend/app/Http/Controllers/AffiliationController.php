<?php

namespace App\Http\Controllers;

use App\Http\Requests\AffiliationStoreRequest;
use App\Models\Affiliation;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param AffiliationStoreRequest $request
     * @return void
     */
    public function store(AffiliationStoreRequest $request)
    {
        $player_id = $request->get('player_id');
        Affiliation::storeAffiliation($player_id);
        $player = Player::find($player_id);

        return back()->with('success', $player->name . 'と契約しました');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Affiliation  $affiliation
     * @return \Illuminate\Http\Response
     */
    public function update(Affiliation $affiliation)
    {
        if($affiliation->user_id !== Auth::user()->id) {
            return back()->with('error', '不正な選手が入力されました。');
        }

        $affiliationUpdateService = app('App\Services\AffiliationUpdateService');
        $affiliationUpdateService::execute($affiliation);

        return back()->with('success', $affiliation->player->name . 'を売却しました。');
    }

    public function changeIsRegular(Affiliation $affiliation)
    {
        $affiliation->is_regular = !$affiliation->is_regular;
        $affiliation->save();
        return back();
    }
}
