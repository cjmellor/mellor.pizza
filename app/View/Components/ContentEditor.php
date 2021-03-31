<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContentEditor extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string  $type
     */
    public function __construct(
        public string $type,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.content-editor');
    }
}
