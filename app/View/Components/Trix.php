<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Trix extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string|null  $content
     * @param  string|null  $id
     */
    public function __construct(
        public string $name,
        public ?string $content = null,
        public ?string $id = null,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.trix');
    }
}
