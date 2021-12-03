<?php

namespace App\View\Components\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View
    {
        return view('components.auth.navigation');
    }
}
