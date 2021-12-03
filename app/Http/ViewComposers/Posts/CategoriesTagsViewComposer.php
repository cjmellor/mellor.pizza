<?php

namespace App\Http\ViewComposers\Posts;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
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
        $categories = Cache::remember(
            key: 'categories',
            ttl: now()->addDay(),
            callback: fn () => $this->category->get(['id', 'name'])
        );

        $tags = Cache::remember(
            key: 'tags',
            ttl: now()->addDay(),
            callback: fn () => $this->tag->get(['id', 'name'])
        );

        $view->with('categories', $categories)
            ->with('tags', $tags);
    }
}
