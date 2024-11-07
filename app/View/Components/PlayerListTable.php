<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PlayerListTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $players;
    public function __construct($players)
    {
        $this->players = $players;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.player-list-table');
    }
}
