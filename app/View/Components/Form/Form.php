<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string  $action
     * @param  string  $method
     * @param  bool  $csrf
     */
    public function __construct(
        public string $action,
        public string $method,
        public bool $csrf = true,
    ) {
        $this->method = [
            'delete' => 'DELETE',
            'patch' => 'PATCH',
            'put' => 'PUT',
        ][$method] ?? 'POST';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.form.form');
    }
}
