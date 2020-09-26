<?php

namespace App\Http\Controllers;

use App\Http\Requests\AffiliationStoreRequest;
use App\Models\Affiliation;
use App\Models\Player;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AffiliationController extends Controller
{

    /**
     * @param AffiliationStoreRequest $request
     * @return RedirectResponse
     */
    public function store(AffiliationStoreRequest $request)
    {
        $player_id = $request->get('player_id');
        $player = Player::find($player_id);

        if($player->price > Auth::user()->currentPelica()) {
            return back()->with('error', '所持ペリカが足りません。');
        }

        $affiliationStoreService = app('App\Services\AffiliationStoreService');
        $affiliationStoreService::execute($player);

        return back()->with('success', $player->name . 'と契約しました');
    }

    /**
     * @param  Affiliation $affiliation
     * @return RedirectResponse
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

    /**
     * @param  Affiliation $affiliation
     * @return RedirectResponse
     */
    public function changeIsRegular(Affiliation $affiliation)
    {
        $affiliation->is_regular = !$affiliation->is_regular;
        $affiliation->save();
        return back();
    }
}
