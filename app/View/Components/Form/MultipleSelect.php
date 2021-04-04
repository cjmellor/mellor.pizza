<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class MultipleSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string  $id
     * @param  string|null  $name
     */
    public function __construct(
        public string $id,
        public ?string $name = null,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.multiple-select');
    }
}
