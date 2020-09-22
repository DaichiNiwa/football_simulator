<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatchCreateRequest;
use App\Models\Match;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param MatchCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(MatchCreateRequest $request)
    {
        $me = Auth::user();
        $opponentId = $request->get('opponent_id');
        $opponent = User::find($opponentId);
        return view('matches.create', compact('me', 'opponent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MatchCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatchCreateRequest $request)
    {
        $me = Auth::user();
        $opponentId = $request->get('opponent_id');
        $opponent = User::find($opponentId);

        if (!Match::canStart($me, $opponent)) {
           return back()->with('error', 'あなたか対戦相手のレギュラーメンバーが揃っていないため、試合ができませんでした。');
        }

        $matchStoreService = app('App\Services\MatchStoreService');
        $result = $matchStoreService::execute($me, $opponent);

        return view('matches.result', compact('result'));
    }
}
