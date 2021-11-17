<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MultipleSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public ?string $name = null,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.form.multiple-select');
    }
}
