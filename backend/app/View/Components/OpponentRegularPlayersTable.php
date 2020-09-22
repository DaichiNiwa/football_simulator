<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class OpponentRegularPlayersTable extends Component
{
    protected $opponent;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($opponent)
    {
        $this->opponent = $opponent;
    }

    public function opponent() {
        return $this->opponent;
    }

    public function affiliations() {
        return User::find($this->opponent->id)->affiliations()->with('player')->regular()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.opponent-regular-players-table');
    }
}
