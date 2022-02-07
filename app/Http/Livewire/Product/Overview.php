<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Product\Entities\Product;

class Overview extends Component
{
    use WithPagination;

    public function getAll()
    {
        if (request()->routeIs('main.index')) {
            $product = Product::getHomePageProducts();
        } else {
            $product = Product::with('images:products_id,image_path,position');
        }

        return $product->orderBy('position')->simplePaginate(5);
    }

    public function previousPage()
    {
        $this->setPage(max($this->page - 1, 1));
        $this->dispatchBrowserEvent('pages-updated');
    }

    public function nextPage()
    {
        $this->setPage($this->page + 1);
        $this->dispatchBrowserEvent('pages-updated');
    }

    public function render()
    {
        return view('livewire.product.overview', [
            'products' => $this->getAll(),
        ]);
    }
}