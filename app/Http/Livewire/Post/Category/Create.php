<?php

namespace App\Http\Livewire\Post\Category;

use Livewire\Component;
use Modules\Post\Entities\PostCategory;

class Create extends Component
{
    public $nama_kategori;

    protected $rules = [
        'nama_kategori' => 'required|min:3|max:191',
    ];

    public function store()
    {
        $this->validate();

        PostCategory::create([
            'name' => $this->nama_kategori,
            'slug_name' => slug($this->nama_kategori),
        ]);

        $this->dispatchBrowserEvent('created', 'Kategori postingan berhasil ditambahkan !');
        $this->emitTo('post.category.table', 'refreshTable');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.post.category.create');
    }
}