<?php

namespace App\Http\Livewire\Project;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Modules\Post\Entities\PostMedia;

class GalleryTable extends Component
{
    public $projectId, $deleteID;

    public function mount($projectId)
    {
        $this->projectId = $projectId;
    }

    protected $listeners = [
        'refreshTable' => '$refresh',
    ];

    public function destroyImage()
    {
        $media = PostMedia::find($this->deleteID);

        if ($media) {
            $origin = request()->headers->get('origin') . '/storage/';
            $path = str_contains($media->media_path, $origin) ? substr($media->media_path, strlen($origin)) : $media->media_path;
            Storage::delete('public/' . $path);

            $media->delete();
            return $this->dispatchBrowserEvent('success', 'Gambar berhasil dihapus.');
        }

        return $this->dispatchBrowserEvent('failed', 'Gambar tidak ditemukan.');
    }

    public function closeModal()
    {
        $this->reset('deleteID');
    }

    public function getAll()
    {
        return PostMedia::where('posts_id', $this->projectId)->where('type', 'gallery')->get();
    }

    public function render()
    {
        return view('livewire.project.gallery-table', [
            'medias' => $this->getAll(),
        ]);
    }
}
