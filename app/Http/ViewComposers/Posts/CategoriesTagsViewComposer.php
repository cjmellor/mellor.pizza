<?php

namespace App\Http\ViewComposers\Posts;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\View\View;

class CategoriesTagsViewComposer
{
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
