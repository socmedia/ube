<?php

namespace App\Http\Livewire\Product;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\Product\Entities\Product;

class Edit extends Component
{
    public $productID, $type = '', $description, $showInHomepage, $spesification = [];

    protected $listeners = [
        'getID' => 'findProduct',
    ];

    protected function rules()
    {
        return [
            'type' => 'required|min:3|max:191|' . Rule::unique('products', 'name')->ignore($this->productID),
            'spesification.*.value' => 'required|max:20',
            'description' => 'nullable|min:10',
        ];
    }

    protected function messages()
    {
        return [
            'spesification.*.value.required' => 'The spesification value is required',
            'spesification.*.value.max' => 'The spesification value may not be greater than :max characters.',
        ];
    }

    public function findProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $this->productID = $product->id;
            $this->type = $product->name;
            $this->description = $product->description;
            $this->showInHomepage = $product->show_in_homepage;
            $spesification = json_decode($product->spesification);
            $this->spesification = [
                [
                    'label' => 'Ukuran',
                    'name' => 'size',
                    'value' => $spesification[0]->size ?? null,
                ],
                [
                    'label' => 'Jumlah Kamar',
                    'name' => 'bedroom',
                    'value' => $spesification[1]->bedroom ?? null,
                ],
                [
                    'label' => 'Jumlah Dapur',
                    'name' => 'kitchen',
                    'value' => $spesification[2]->kitchen ?? null,
                ],
                [
                    'label' => 'Jumlah Km. Mandi',
                    'name' => 'bathroom',
                    'value' => $spesification[3]->bathroom ?? null,
                ],
                [
                    'label' => 'Jumlah Lantai',
                    'name' => 'floor',
                    'value' => $spesification[4]->floor ?? null,
                ],
            ];
        }
    }

    public function updateProduct()
    {
        $this->validate();

        $spesification = array_map(function ($value) {
            return [
                $value['name'] => $value['value'],
            ];

        }, $this->spesification);

        $product = Product::find($this->productID);
        $product->name = $this->type;
        $product->slug_name = slug($this->type);
        $product->spesification = json_encode($spesification);
        $product->description = $this->description;
        $product->show_in_homepage = $this->showInHomepage;
        $product->save();

        $this->dispatchBrowserEvent('updated', 'Apartemen berhasil diperbarui !');
        $this->emitTo('product.table', 'refreshTable');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.product.edit');
    }
}