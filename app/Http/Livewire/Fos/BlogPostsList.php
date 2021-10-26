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

    public function getAllBlogPosts()
    {
        $this->perPage = 0;

        $this->viewingAll = true;
    }

    public function viewLessPosts(int $perPage = 3)
    {
        $this->perPage = $perPage;

        $this->viewingAll = false;
    }

    public function paginationView(): string
    {
        return 'livewire.fos.pagination.view';
    }

    public function render(): View
    {
        return view('livewire.fos.blog-posts-list', [
            'posts' => Post::paginate($this->perPage),
        ]);
    }
}
