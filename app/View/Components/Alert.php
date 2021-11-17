<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public function __construct(
        public string $type,
        public ?string $title = null,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Closure
    {
        return function (array $data) {
            $this->type = $this->setType($this->type);

            return 'components.alert';
        };
    }

    /**
     * Determines the type of alert to use.
     */
    public function setType(string $type): string
    {
        return $data['attributes'] = match ($type) {
            'info' => 'info',
            'success' => 'success',
            'warning' => 'warning',
            'error' => 'error',
            default => null,
        };
    }
}
