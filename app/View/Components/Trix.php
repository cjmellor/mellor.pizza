<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Trix extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string  $content
     * @param  string  $name
     * @param  string|null  $id
     */
    public function __construct(
        public string $content,
        public string $name,
        public ?string $id = null,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.trix');
    }
}
