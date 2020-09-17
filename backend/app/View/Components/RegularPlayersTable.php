<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class RegularPlayersTable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function affiliations() {
        return Auth::user()->affiliations()->with('player')->regular()->get();
    }

    public function goalkeepers() {
        return Auth::user()->goalkeepersInRegular();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.regular-players-table');
    }
}
