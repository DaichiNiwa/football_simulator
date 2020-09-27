<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIsTodayLoanDeadline
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (Auth::user()->isTodayLoanDeadline()) {
            session()->flash('notice', '本日がローンの返済期限です。銀行で返済してください。期限内に返済しないと、返済額を返すためにランダムに選手が強制売却されます。');
        }
        return $response;
    }
}
