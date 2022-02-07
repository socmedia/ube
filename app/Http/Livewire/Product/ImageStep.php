<?php

namespace App\Http\Livewire\Product;

use App\Traits\FileHandler;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductsImage;

class ImageStep extends Component
{
    use WithFileUploads, FileHandler;

    public $images = [], $productId;

    protected $listeners = [
        'productCreated',
        'removeImage',
    ];

    protected $rules = [
        'images.*' => 'required|mimes:png,jpg,jpeg,webp|max:512',
    ];

    public function productCreated($productId)
    {
        $this->productId = $productId;
    }

    public function saveImage()
    {
        $this->validate();
        foreach ($this->images as $key => $image) {
            $this->createImage($image);
        }

        $product = Product::find($this->productId);
        $product->show_in_homepage = 1;
        $product->save();

        $this->dispatchBrowserEvent('created', 'Apartemen berhasil ditambahkan !');
        $this->emitTo('product.table', 'refreshTable');
        $this->reset();
    }

    public function createImage($singleImage)
    {
        $last = ProductsImage::where('products_id', $this->productId)->orderBy('position', 'desc')->first();

        $image = new ProductsImage();
        $image->products_id = $this->productId;
        $image->image_path = $singleImage->store('images/products', 'public');
        $image->position = $last ? $last->position + 1 : 1;
        $image->save();
    }

    public function removeImage($name, $key)
    {
        try {
            $file = storage_path('app/livewire-tmp/' . $name);
            unlink($file);
            array_splice($this->images, $key, 1);
        } catch (Exception $e) {
            //
        }
    }

    public function render()
    {
        return view('livewire.product.image-step');
    }
}