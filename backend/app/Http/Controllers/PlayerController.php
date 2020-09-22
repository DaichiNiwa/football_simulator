<?php

namespace App\Http\Controllers;

use App\Models\Player;

class PlayerController extends Controller
{
    const PLAYERS_PER_PAGE = 20;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::paginate(self::PLAYERS_PER_PAGE);
        return view('players.index', compact('players'));
    }
}
