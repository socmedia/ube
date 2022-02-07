<?php

namespace App\Http\Livewire\Blog;

use App\Traits\FileHandler;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostCategory;
use Modules\Post\Entities\PostStatus;

class Table extends Component
{
    use WithPagination, FileHandler;

    public $deleteID, $perPage = 12;

    protected $listeners = [
        'refreshTable' => '$refresh',
    ];

    public $filters = [
        'status' => [
            'column' => 'status_id',
            'label' => 'Status',
            'value' => null,
        ],
        'category' => [
            'column' => 'category_id',
            'label' => 'Kategori',
            'value' => null,
        ],
        'search' => [
            'column' => '*',
            'label' => 'Pencarian',
            'value' => null,
        ],
    ];

    public function getAll()
    {
        $blogs = Post::where('type_id', 2)->orderBy('created_at', 'desc');

        if ($this->filters['category']['value']) {
            $blogs->whereHas('category', function ($query) {
                $query->where('name', $this->filters['category']['value']);
            });
        }

        if ($this->filters['status']['value']) {
            $blogs->whereHas('status', function ($query) {
                $query->where('name', $this->filters['status']['value']);
            });
        }

        if ($this->filters['search']['value']) {
            $blogs->where(function ($q) {
                $q->where('title', 'like', '%' . $this->filters['search']['value'] . '%')
                    ->orWhere('tags', 'like', '%' . $this->filters['search']['value'] . '%')
                    ->orWhere('subject', 'like', '%' . $this->filters['search']['value'] . '%')
                    ->orWhere('description', 'like', '%' . $this->filters['search']['value'] . '%');
            });
        }

        return $blogs->simplePaginate($this->perPage);
    }

    public function closeModal()
    {
        $this->deleteID = null;
    }

    public function destroyBlog()
    {
        $blog = Post::findOrFail($this->deleteID);

        if (!$blog->medias->isEmpty()) {
            foreach ($blog->medias as $media) {
                $origin = request()->headers->get('origin') . '/storage/';
                $path = str_contains($media->media_path, $origin) ? substr($media->media_path, strlen($origin)) : $media->media_path;
                Storage::delete('public/' . $path);
            }
        }

        $blog->forceDelete();

        $this->dispatchBrowserEvent('deleted', 'Blog berhasil dihapus !');
        $this->reset('deleteID');
    }

    public function render()
    {
        return view('livewire.blog.table', [
            'posts' => $this->getAll(),
            'categories' => PostCategory::all(['id', 'name']),
            'statuses' => PostStatus::all(['id', 'name']),
        ]);
    }
}