<?php

namespace App\Http\Livewire\Banner;

use App\Traits\FileHandler;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Banner\Entities\Banner;

class Edit extends Component
{
    use WithFileUploads, FileHandler;

    public $bannerID, $bannerType, $name, $alt, $oldMedia, $media, $oldThumbnail, $thumbnail, $url, $isActive;

    protected $listeners = [
        'getID' => 'findBanner',
    ];

    protected function rules()
    {
        if ($this->bannerType === 'image') {
            $media = 'image|mimes:png,jpg,webp|max:512';
        }

        if ($this->bannerType === 'video') {
            $media = 'mimeTypes:video/mp4,video/avi|max:51200';
        }

        return [
            'name' => 'required|min:3|max:191',
            'alt' => 'nullable|min:3|max:191',
            'url' => 'nullable|active_url|min:3|max:191',
            'thumbnail' => 'nullable|image|mimes:png,jpg,webp|max:512',
            'media' => 'nullable|' . $media,
        ];
    }

    public function findBanner($id)
    {
        $banner = Banner::findOrFail($id);
        if ($banner) {
            $this->bannerID = $banner->id;
            $this->bannerType = $banner->banner_type;
            $this->name = $banner->name;
            $this->alt = $banner->alt;
            $this->url = $banner->references_url;
            $this->oldMedia = $banner->media_path;
            $this->oldThumbnail = $banner->thumbnail;
            $this->isActive = $banner->is_active;
        }
    }

    public function updateBanner()
    {
        $this->validate();

        $banner = Banner::findOrFail($this->bannerID);

        if ($this->bannerType === 'image') {
            $banner->name = $this->name;

            if ($this->media) {
                $banner->media_path = $this->media->store('images/banner', 'public');
            }

            $banner->alt = $this->alt ? $this->alt : $this->name;
            $banner->references_url = $this->url;
            $banner->position = $banner->position;
            $banner->is_active = $this->isActive ? 1 : 0;
        }

        if ($this->bannerType === 'video') {
            $banner->name = $this->name;

            if ($this->media) {
                $banner->media_path = $this->media->store('videos/banner', 'public');
            }

            if ($this->thumbnail) {
                $banner->thumbnail = $this->thumbnail->store('images/banner', 'public');
            }

            $banner->position = $banner->position;
            $banner->is_active = $this->isActive ? 1 : 0;
        }

        $banner->save();

        $this->dispatchBrowserEvent('updated', 'Layanan berhasil diperbarui !');
        $this->emitTo('banner.table', 'refreshTable');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.banner.edit');
    }
}