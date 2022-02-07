<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use Modules\Post\Entities\Post;

class Overview extends Component
{
    public $isHomePage = false;

    public function mount()
    {
        $this->isHomePage = request()->routeIs('main.index');
    }

    public function getAll()
    {
        $post = Post::where(function ($query) {
            $query->where('type_id', 1)
                ->where('status_id', 2);
        })->with('thumbnail')->orderBy('created_at', 'desc');

        return $post->paginate($this->isHomePage ? 14 : 20);
    }

    public function render()
    {
        return view('livewire.project.overview', [
            'posts' => $this->getAll(),
        ]);
    }
}