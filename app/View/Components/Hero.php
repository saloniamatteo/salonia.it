<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Hero extends Component
{
    /* Create a new component instance. */
    public function __construct(
        public string $id,
        public string $class = '',
        public string $img = '',
        public string $alt = '',
    ) {}

    /* Get the view / contents that represent the component. */
    public function render()
    {
        return view('components.hero');
    }
}
