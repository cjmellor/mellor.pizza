<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MarkdownEditor extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string  $id
     * @param  string|null  $name
     * @param  array  $options
     */
    public function __construct(
        public string $id = 'mde',
        public ?string $name = null,
        public array $options = [],
    ) {
    }

    /**
     * Gets the APP_URL from config to pass to view to run JS.
     *
     * @return mixed
     */
    public function endpointBaseUrl(): mixed
    {
        return config('app.url');
    }

    /**
     * Parse the array of options to JSON.
     *
     * @see https://github.com/Ionaru/easy-markdown-editor#options-list
     *
     * @return string
     */
    public function optionsToJson(): string
    {
        if (empty($this->defaultOptions())) {
            return '';
        }

        return ', ...'.json_encode($this->defaultOptions());
    }

    /**
     * Supply an array of default you want to always be active.
     *
     * @return array
     */
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

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.markdown-editor');
    }
}
