<?php

namespace App\View\Components\Fos;

use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string|null  $title
     */
    public function __construct(public ?string $title = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.fos.layout');
    }
}
