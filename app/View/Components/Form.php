<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string  $action
     * @param  bool  $csrf
     * @param  string  $method
     */
    public function __construct(
        public string $action,
        public bool $csrf = true,
        public string $method = 'post'
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form');
    }
}
