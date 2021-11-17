<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
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

    public function render(): View
    {
        return view('components.form.form');
    }
}
