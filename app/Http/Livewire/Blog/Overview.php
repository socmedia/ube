<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Post\Entities\Post;

class Overview extends Component
{
    use WithPagination;

    public $isHomePage = false;

    public function mount()
    {
        $this->isHomePage = request()->routeIs('main.index');
    }

    public function getAll()
    {
        $post = Post::where(function ($query) {
            $query->where('type_id', 2)
                ->where('status_id', 2);
        })->with('thumbnail')->orderBy('created_at', 'desc');

        return $post->paginate($this->isHomePage ? 6 : 9);
    }

    public function render()
    {
        return view('livewire.blog.overview', [
            'posts' => $this->getAll(),
        ]);
    }
}