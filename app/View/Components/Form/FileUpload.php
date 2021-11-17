<?php

namespace App\View\Components\Form;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FileUpload extends Component
{
    public function __construct(
        public Post $post,
    ) {
    }

    public function render(): View
    {
        return view('components.form.file-upload');
    }
}
