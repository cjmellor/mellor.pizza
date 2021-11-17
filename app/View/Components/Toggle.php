<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toggle extends Component
{
    public function __construct(public bool $enabled = false)
    {
        //
    }

    public function render(): View
    {
        return view('components.toggle');
    }
}
