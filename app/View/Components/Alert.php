<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string  $type
     */
    public function __construct(
        public string $type
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Closure
     */
    public function render()
    {
        return function (array $data) {
            $this->type = $this->setType($this->type);

            return 'components.alert';
        };
    }

    /**
     * Determines the type of alert to use.
     *
     * @param  string  $type
     * @return string
     */
    public function setType(string $type): string
    {
        return $data['attributes'] = match ($type) {
            // TODO: change these to Tailwind classes
            'info' => 'info',
            'success' => 'success',
            'warning' => 'warning',
            default => null,
        };
    }
}
