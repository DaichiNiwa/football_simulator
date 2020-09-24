<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubNameStoreRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $me = Auth::User();
        $opponents = User::where('id', '!=', $me->id)->get();
        return view('users.index', compact('me', 'opponents'));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show()
    {
        $user = Auth::user();
        return view('users.show', compact('user'));
    }

    /**
     * クラブ名を登録する
     *
     * @param ClubNameStoreRequest $request
     * @return Response
     */
    public function update(ClubNameStoreRequest $request)
    {
        $user = Auth::user();

        if (is_null($user->club_name)) {
            $club_name = $request->get('club_name');

            $clubNameStoreService = app('App\Services\ClubNameStoreService');
            $clubNameStoreService::execute($user, $club_name);

            $request->session()->flash('success', 'クラブ名を登録しました。');
        }

        return back();
    }
}
