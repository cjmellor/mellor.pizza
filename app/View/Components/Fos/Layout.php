<?php

namespace App\View\Components\Fos;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public function __construct(public ?string $title = null)
    {
        //
    }

    public function render(): View
    {
        return view('components.fos.layout');
    }
}
