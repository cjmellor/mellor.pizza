<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContentEditor extends Component
{
    public function __construct(
        public string $type = 'html',
        public bool $editMode = false,
    ) {
        //
    }

    public function render(): View
    {
        return view('components.content-editor');
    }
}
