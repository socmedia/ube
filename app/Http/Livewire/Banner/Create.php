<?php

namespace App\Http\Livewire\Banner;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Banner\Entities\Banner;

class Create extends Component
{
    use WithFileUploads;

    public $name = '', $alt, $url, $media, $thumbnail, $bannerType = 'image';

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
            'media' => 'required|' . $media,
        ];
    }

    public function updatedBannerType()
    {
        $this->reset(['name', 'alt', 'url', 'media', 'thumbnail']);
    }

    public function createBanner()
    {
        $this->validate();

        $banner = Banner::latest()->first();
        $position = $banner ? $banner->position + 1 : 1;

        if ($this->bannerType === 'image') {
            Banner::create([
                'banner_type' => 'image',
                'name' => $this->name,
                'media_path' => $this->media->store('images/banner', 'public'),
                'alt' => $this->alt ? $this->alt : $this->name,
                'references_url' => $this->url,
                'position' => $position,
                'is_active' => 1,
            ]);
        }

        if ($this->bannerType === 'video') {
            Banner::create([
                'banner_type' => 'video',
                'name' => $this->name,
                'media_path' => $this->media->store('videos/banner', 'public'),
                'thumbnail' => $this->thumbnail->store('images/banner', 'public'),
                'position' => $position,
                'is_active' => 1,
            ]);
        }

        $this->dispatchBrowserEvent('created', 'Banner berhasil ditambahkan !');
        $this->emitTo('banner.table', 'refreshTable');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.banner.create');
    }
}