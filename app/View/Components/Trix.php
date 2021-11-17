<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Trix extends Component
{
    public function __construct(
        public string $name,
        public ?string $content = null,
        public ?string $id = null,
    ) {
    }

    public function render(): View
    {
        return view('components.trix');
    }
}
