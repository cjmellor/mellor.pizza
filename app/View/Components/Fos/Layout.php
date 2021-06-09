<?php

namespace App\View\Components\Fos;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ?string $title = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.fos.layout');
    }
}
