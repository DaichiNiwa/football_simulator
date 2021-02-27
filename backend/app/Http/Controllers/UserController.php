<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubNameStoreRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $me = Auth::User();
        $opponents = User::where('id', '!=', $me->id)->get();
        return view('users.index', compact('me', 'opponents'));
    }

    /**
     * @return Application|Factory|View
     */
    public function me()
    {
        $user = Auth::user();
        return view('users.show', compact('user'));
    }

    /**
     * クラブ名を登録する
     *
     * @param ClubNameStoreRequest $request
     * @return RedirectResponse
     */
    public function registerClubName(ClubNameStoreRequest $request)
    {
        $user = Auth::user();

        if (is_null($user->club_name)) {
            $club_name = $request->get('club_name');

            $clubNameStoreService = app('App\Services\ClubNameStoreService');
            $clubNameStoreService::execute($user, $club_name);

            $request->session()->flash('success', 'クラブ名を登録しました。初回ボーナス20ペリカを獲得しました。');
        }

        return back();
    }
}
