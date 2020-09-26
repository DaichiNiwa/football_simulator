<?php

namespace App\Http\Controllers;

use App\Models\LoanOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoanOptionController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $user = Auth::user();
        return view('loans.index', compact('user'));
    }
}
