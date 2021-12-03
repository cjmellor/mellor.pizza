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
        return empty($this->defaultOptions()) ? '' : ', ...'.json_encode($this->defaultOptions());
    }

    public function defaultOptions(): array
    {
        $defaults = [
            'forceSync' => true,
            'hideIcons' => ['side-by-side', 'fullscreen', 'guide'],
            'imageAccept' => 'image/png, image/jpeg, image/jpg, image/webp, image/avif',
            'imageMaxSize' => 3 * 1024 * 1024,
            'previewClass' => 'prose dark:prose-invert prose-2xl',
            'promptURLs' => true,
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
