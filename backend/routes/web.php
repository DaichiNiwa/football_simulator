<?php

use App\Http\Controllers\AffiliationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\MatchController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', '/login');

Route::middleware('auth')->group(static function () {

    Route::get('users/me',
        [UserController::class, 'show']
    )->name('me');

    Route::resource('users',
        UserController::class,
        ['only' => ['index', 'update']]
    );

    Route::resource('players',
        PlayerController::class,
        ['only' => ['index']]
    );

    Route::patch('affiliations/{affiliation}/regular-change',
        [AffiliationController::class, 'changeIsRegular']
    )->name('changeIsRegular');

    Route::resource('affiliations',
        AffiliationController::class,
        ['only' => ['store', 'update']]
    );

    Route::resource('matches',
        MatchController::class,
        ['only' => ['create', 'store']]
    );

//    Route::get('dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');


//    Route::resources([
//        'users' => UserController::class,
//        'players' => PlayerController::class,
//        'affiliations' => AffiliationController::class,
//    ]);

});

