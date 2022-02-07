<?php

namespace App\Http\Livewire\Product\Image;

use App\Traits\FileHandler;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductsImage;

class Create extends Component
{
    use WithFileUploads, FileHandler;

    public $image, $productId;

    protected $listeners = [
        'removeImage',
    ];

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    protected $rules = [
        'image' => 'required|mimes:png,jpg,jpeg,webp|max:512',
    ];

    public function storeImage()
    {
        $this->validate();

        $last = ProductsImage::where('products_id', $this->productId)->orderBy('position', 'desc')->first();

        $image = new ProductsImage();
        $image->products_id = $this->productId;
        $image->image_path = $this->image->store('images/products', 'public');
        $image->position = $last ? $last->position + 1 : 1;
        $image->save();

        $this->dispatchBrowserEvent('created', 'Gambar berhasil ditambahkan !');
        $this->emitTo('product.image.table', 'refreshTable');
        $this->reset('image');
    }

    public function render()
    {
        return view('livewire.product.image.create');
    }
}