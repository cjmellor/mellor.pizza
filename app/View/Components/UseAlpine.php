<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UseAlpine extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  float|string  $version
     */
    public function __construct(
        public float|string $version = 'latest',
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<< blade
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@$this->version/dist/alpine.min.js" defer></script>
        blade;
    }
}
