<?php

namespace App\View\Components;

use Illuminate\View\Component;
use JetBrains\PhpStorm\Pure;

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
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form');
    }
}
