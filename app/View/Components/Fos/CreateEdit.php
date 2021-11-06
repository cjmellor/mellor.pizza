<?php

namespace App\View\Components\Fos;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateEdit extends Component
{
    public const METHOD_CREATE = 'post';
    public const METHOD_EDIT = 'patch';

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

    public function getMethod(): string
    {
        return match ($this->mode) {
            'create' => self::METHOD_CREATE,
            'edit' => self::METHOD_EDIT,
            default => '',
        };
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
