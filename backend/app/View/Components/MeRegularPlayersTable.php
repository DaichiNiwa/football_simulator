<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class MeRegularPlayersTable extends Component
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

    public function affiliations() {
        return Auth::user()->affiliations()->with('player')->regular()->get();
    }

    public function user() {
        return Auth::user();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.me-regular-players-table');
    }
}
