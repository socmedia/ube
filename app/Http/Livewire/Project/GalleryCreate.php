<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Post\Entities\PostMedia;

class GalleryCreate extends Component
{
    use WithFileUploads;

    public $projectId, $image;

    public function mount($projectId)
    {
        $this->projectId = $projectId;
    }

    public function store()
    {
        PostMedia::create([
            'posts_id' => $this->projectId,
            'type' => 'gallery',
            'media_type' => 'image',
            'media_path' => url('/storage/' . $this->image->store(now()->toDateString(), 'public')),
        ]);

        $this->emitTo('project.gallery-table', 'refreshTable');
        $this->reset('image');
        $this->dispatchBrowserEvent('success', 'Gambar berhasil ditambahkan ke dalam galeri proyek.');
    }

    public function render()
    {
        return view('livewire.project.gallery-create');
    }
}
