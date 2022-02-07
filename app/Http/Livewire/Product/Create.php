<?php

namespace App\Http\Livewire\Product;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Entities\Product;

class Create extends Component
{
    use WithFileUploads;

    public $type = '', $description;

    public $spesification = [
        [
            'label' => 'Ukuran',
            'name' => 'size',
            'value' => null,
        ],
        [
            'label' => 'Jumlah Kamar',
            'name' => 'bedroom',
            'value' => null,
        ],
        [
            'label' => 'Jumlah Dapur',
            'name' => 'kitchen',
            'value' => null,
        ],
        [
            'label' => 'Jumlah Km. Mandi',
            'name' => 'bathroom',
            'value' => null,
        ],
        [
            'label' => 'Jumlah Lantai',
            'name' => 'floor',
            'value' => null,
        ],
    ];

    protected function rules()
    {
        return [
            'type' => 'required|min:3|max:191|' . Rule::unique('products', 'name'),
            'spesification.*.value' => 'required|max:10',
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

    public function createProduct()
    {
        $this->validate();

        $product = Product::latest()->first();

        $spesification = array_map(function ($value) {
            $denomination = '';

            if ($value['name'] === 'bedroom') {
                $denomination = ' Kamar';
            } elseif ($value['name'] === 'kitchen') {
                $denomination = ' Dapur';
            } elseif ($value['name'] === 'bathroom') {
                $denomination = ' Km. Mandi';
            } elseif ($value['name'] === 'floor') {
                $denomination = ' Lantai';
            }

            return [
                $value['name'] => $value['value'] . $denomination,
            ];

        }, $this->spesification);

        Product::create([
            'name' => $this->type,
            'slug_name' => slug($this->type),
            'spesification' => json_encode($spesification),
            'description' => $this->description,
            'position' => $product ? $product->position + 1 : 1,
            'show_in_homepage' => 0,
        ]);

        $productCreated = Product::where('name', $this->type)->first();
        $this->dispatchBrowserEvent('show-image-modal');
        $this->emitTo('product.image-step', 'productCreated', $productCreated->id);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.product.create');
    }
}