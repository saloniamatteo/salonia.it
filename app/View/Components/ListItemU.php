<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListItemU extends Component
{
    /* Create a new component instance. */
    public function __construct(
        public string $name,
    ) {}

    /* Get the view / contents that represent the component. */
    public function render()
    {
        return view('components.list-item-u');
    }
}
