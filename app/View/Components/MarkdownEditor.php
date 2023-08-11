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
            'previewClass' => 'prose dark:prose-invert prose-a:text-pop prose-a:no-underline hover:prose-a:underline dark:hover:prose-a:decoration-pizza-dark prose-code:text-pizza prose-code:bg-pizza/30 dark:prose-code:text-pink-600 dark:prose-code:bg-pink-900/30 prose-code:px-1.5 prose-code:font-roboto-mono prose-code:before:content-none prose-code:after:content-none',
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
