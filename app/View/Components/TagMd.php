<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TagMd extends Component
{
    /** Create a new component instance. */
    public function __construct(
        public string $id,
    ) {}

    /** Get the view / contents that represent the component. */
    public function render()
    {
        return view('components.tag-md');
    }
}
