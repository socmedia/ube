<?php

namespace App\Http\Livewire\Product\Image;

use App\Traits\FileHandler;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Product\Entities\ProductsImage;

class Table extends Component
{
    use WithPagination, FileHandler;

    public $deleteID, $productId;

    protected $listeners = [
        'refreshTable' => '$refresh',
    ];

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function getAll()
    {
        $images = ProductsImage::orderBy('position')->where('products_id', $this->productId);
        return $images->simplePaginate(10);

    }

    public function destroyImage()
    {
        $image = ProductsImage::findOrFail($this->deleteID);

        try {
            unlink(storage_path('app/public/' . $image->image_path));
        } catch (Exception $e) {
            //
        }

        $image->delete();

        $this->dispatchBrowserEvent('deleted', 'Gammbar berhasil dihapus !');
        $this->reset('deleteID');
    }

    public function updateOrder($list)
    {
        foreach ($list as $item) {
            ProductsImage::find($item['value'])->update([
                'position' => $item['order'],
            ]);
        }
    }

    public function render()
    {
        return view('livewire.product.image.table', [
            'images' => $this->getAll(),
        ]);
    }
}