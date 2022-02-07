<?php

namespace App\Http\Livewire\Product;

use App\Traits\FileHandler;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductsImage;

class Table extends Component
{
    use WithPagination, FileHandler;

    public $search, $deleteID, $video = '', $thumbnail = '';

    protected $listeners = [
        'refreshTable' => '$refresh',
    ];

    public function find($id)
    {
        $this->emitTo('product.edit', 'getID', $id);
    }

    public function getAll($search)
    {
        $products = Product::orderBy('position')->with('thumbnail');

        if ($search !== '') {
            $products->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('spesification', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        return $products->simplePaginate(10);

    }

    public function destroyProduct()
    {
        $product = Product::findOrFail($this->deleteID);

        $images = ProductsImage::where('products_id', $product->id)->get();
        foreach ($images as $image) {
            try {
                unlink(storage_path('app/public/' . $image->image_path));
            } catch (Exception $e) {
                //
            }
        }

        $product->delete();
        $this->dispatchBrowserEvent('deleted', 'Apartemen berhasil dihapus !');
        $this->reset('deleteID');
    }

    public function updateStatus($id)
    {
        $product = Product::findOrFail($id);
        $product->show_in_homepage = $product->show_in_homepage === 1 ? 0 : 1;
        $product->save();

        $this->dispatchBrowserEvent('updated', 'Status apartemen berhasil diperbarui !');
    }

    public function updateOrder($list)
    {
        foreach ($list as $item) {
            Product::find($item['value'])->update([
                'position' => $item['order'],
            ]);
        }
    }

    public function render()
    {
        $products = $this->getAll($this->search);

        return view('livewire.product.table', [
            'products' => $products,
        ]);
    }
}