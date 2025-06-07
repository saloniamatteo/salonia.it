<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Img extends Component
{
    /* Create a new component instance. */
    public function __construct(
        public string $alt,
        public string $path,
        public string $class = '',
    ) {}

    /* Get the view / contents that represent the component. */
    public function render()
    {
        return view('components.img');
    }
}
