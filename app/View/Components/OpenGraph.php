<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OpenGraph extends Component
{
    public function __construct(
        public Post $post
    ) {
        //
    }

    public function render(): View
    {
        return view('components.open-graph');
    }
}
