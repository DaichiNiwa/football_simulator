<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatchCreateRequest;
use App\Models\Match;
use App\Models\User;
use App\Services\MatchStoreService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MatchController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param MatchCreateRequest $request
     * @return Application|Factory|Response|View
     */
    public function create(MatchCreateRequest $request)
    {
        $me = Auth::user();
        $opponentId = $request->get('opponent_id');
        $opponent = User::find($opponentId);

        return view('matches.create', compact('me', 'opponent'));
    }


    /**
     * @param MatchCreateRequest $request
     * @param MatchStoreService $matchStoreService
     * @return Application|Factory|RedirectResponse|View
     */
    public function store(MatchCreateRequest $request, MatchStoreService $matchStoreService)
    {
        $me = Auth::user();
        $opponentId = $request->get('opponent_id');
        $opponent = User::find($opponentId);

        if (!Match::canStart($me, $opponent)) {
           return back()->with('error', 'あなたか対戦相手のレギュラーメンバーが揃っていないため、試合ができませんでした。');
        }

        $result = $matchStoreService->execute($me, $opponent);

        return view('matches.result', compact('result'));
    }
}
