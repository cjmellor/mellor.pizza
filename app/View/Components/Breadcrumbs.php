<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    public function __construct(public array $lists)
    {
        //
    }

    public function render(): View
    {
        return view('components.breadcrumbs');
    }
}
