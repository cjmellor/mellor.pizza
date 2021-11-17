<?php

namespace App\View\Components\Fos;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateEdit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $action,
        public string $mode,
        public Post $post,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.fos.create-edit');
    }

    public function setTitle(): string
    {
        return match ($this->mode) {
            'create' => 'Create a new Post',
            'edit' => "Editing Post: {$this->post->title}",
            default => '',
        };
    }
}
