<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubNameStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
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
        $users = User::where('id', '!=', $me->id)->get();
        return view('users.index', compact('users', 'me'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        //
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
            $user->club_name = $request->get('club_name');
            $user->save();
            $request->session()->flash('success', 'クラブ名を登録しました。');
        }
        return redirect(route('me'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }
}
