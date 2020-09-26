<?php

namespace App\View\Components;

use App\Models\LoanOption;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class LoanOptionTable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function user() {
        return Auth::user();
    }

    public function loanOptions() {
        return LoanOption::all();;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.loan-option-table');
    }
}
