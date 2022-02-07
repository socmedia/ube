<?php

namespace App\Http\Livewire\Banner;

use App\Traits\FileHandler;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Banner\Entities\Banner;

class Table extends Component
{
    use WithPagination, FileHandler;

    public $search, $deleteID, $video = '', $thumbnail = '';

    protected $listeners = [
        'refreshTable' => '$refresh',
    ];

    public function find($id)
    {
        $this->emitTo('banner.edit', 'getID', $id);
        $this->emitTo('banner.preview', 'getID', $id);
    }

    public function getAll($search)
    {
        $banners = Banner::orderBy('position');

        if ($search !== '') {
            $banners->where(function ($q) use ($search) {
                $q->where('banner_type', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%');
            });
        }

        return $banners->simplePaginate(10);
    }

    public function findBanner($id)
    {
        $banner = Banner::find($id);
        $this->video = url($banner->media_path);
        $this->thumbnail = url($banner->thumbnail);
    }

    public function destroyBanner()
    {
        $banner = Banner::findOrFail($this->deleteID);

        if ($banner->image_path) {
            $this->deleteMedia(explode('/', $banner->image_path)[2], 'banners');
        }

        $banner->delete();

        $this->dispatchBrowserEvent('deleted', 'Banner berhasil dihapus !');
        $this->reset('deleteID');
    }

    public function updateStatus($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->show_in_homepage = $banner->show_in_homepage === 1 ? 0 : 1;
        $banner->save();

        $this->dispatchBrowserEvent('updated', 'Status banner berhasil diperbarui !');
    }

    public function updateOrder($list)
    {
        foreach ($list as $item) {
            Banner::find($item['value'])->update([
                'position' => $item['order'],
            ]);
        }
    }

    public function render()
    {
        return view('livewire.banner.table', [
            'banners' => $this->getAll($this->search),
        ]);
    }
}