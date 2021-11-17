<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MarkdownEditor extends Component
{
    public function __construct(
        public string $id = 'mde',
        public ?string $name = null,
        public array $options = [],
    ) {
    }

    public function endpointBaseUrl(): mixed
    {
        return config('app.url');
    }

    public function optionsToJson(): string
    {
        if (empty($this->defaultOptions())) {
            return '';
        }

        return ', ...'.json_encode($this->defaultOptions());
    }

    public function defaultOptions(): array
    {
        $defaults = [
            'forceSync' => true,
            'renderingConfig' => [
                'codeSyntaxHighlighting' => true,
            ],
            'showIcons' => ['code', 'table'],
            'status' => false,
            'uploadImage' => true,
        ];

        return array_merge($defaults, $this->options);
    }

    public function render(): View
    {
        return view('components.markdown-editor');
    }
}
