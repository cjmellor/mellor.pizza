<?php

namespace App\View\Components\Fos;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateEdit extends Component
{
    public function __construct(
        public string $action,
        public string $mode,
        public Post $post,
    ) {
    }

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
