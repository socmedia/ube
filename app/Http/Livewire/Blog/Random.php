<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use Modules\Post\Entities\Post;

class Random extends Component
{
    public function getAll()
    {
        $post = Post::where(function ($query) {
            $query->where('type_id', 2)
                ->where('status_id', 2);
        })->with('thumbnail');

        return $post->limit(3)->inRandomOrder()->get();
    }

    public function render()
    {
        return view('livewire.blog.random', [
            'posts' => $this->getAll(),
        ]);
    }
}