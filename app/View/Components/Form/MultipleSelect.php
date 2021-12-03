<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MultipleSelect extends Component
{
    public function __construct(
        public string $id,
        public ?string $name = null,
    ) {
        //
    }

    public function render(): View
    {
        return view('components.form.multiple-select');
    }
}
