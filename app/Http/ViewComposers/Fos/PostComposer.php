<?php

namespace App\Http\ViewComposers\Fos;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\View\View;

class PostComposer
{
    /**
     * Create a new post composer.
     *
     * @param  \App\Models\Category  $category
     * @param  \App\Models\Tag  $tag
     */
    public function __construct(
        public Category $category,
        public Tag $tag
    ) {
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->category->get(['id', 'name']))
            ->with('tags', $this->tag->get(['id', 'name']));
    }
}
