<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayerController;


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

Route::get('users/me', [UserController::class, 'show']);
Route::resource('users', UserController::class, ['only' => ['index']]);
Route::resource('players', PlayerController::class, ['only' => ['index']]);


Route::get('/', function () {
    return redirect('login');
});


Route::middleware('auth')->group(static function() {

    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



});

