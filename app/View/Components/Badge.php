<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Badge extends Component
{
    /* Create a new component instance. */
    public function __construct(
        public string $alt,
        public string $image,
        public string $name,
        public string $date,
    ) {}

    /* Get the view / contents that represent the component. */
    public function render()
    {
        return view('components.badge');
    }
}
