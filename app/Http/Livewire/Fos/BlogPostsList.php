<?php

namespace App\Http\Livewire\Fos;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class BlogPostsList extends Component
{
    use WithPagination;

    public int $perPage = 3;
    public bool $viewingAll = false;

    public function viewMoreOrLessPosts()
    {
        if ($this->viewingAll === false) {
            return $this->getAllBlogPosts();
        }

        return $this->viewLessPosts();
    }

    public function getAllBlogPosts()
    {
        $this->perPage = 0;

        $this->viewingAll = true;
    }

    public function viewLessPosts()
    {
        $this->reset('perPage');

        $this->viewingAll = false;
    }

    public function paginationView(): string
    {
        return 'livewire.fos.pagination.view';
    }

    public function render(): View
    {
        return view('livewire.fos.blog-posts-list', [
            'posts' => Post::orderByDesc(column: 'id')
                ->paginate($this->perPage),
        ]);
    }
}
