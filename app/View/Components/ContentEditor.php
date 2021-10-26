<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContentEditor extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type,
        public bool $editMode = false,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.content-editor');
    }
}
