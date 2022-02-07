<?php

namespace App\Http\Livewire\Post\Category;

use Livewire\Component;
use Modules\Post\Entities\PostCategory;

class Edit extends Component
{
    public $categoryID, $nama_kategori;

    protected $rules = [
        'nama_kategori' => 'required|min:3|max:191',
    ];

    protected $listeners = ['getID' => 'findCategory'];

    public function findCategory($id)
    {
        $category = PostCategory::findOrFail($id);
        $this->categoryID = $category->id;
        $this->nama_kategori = $category->name;
    }

    public function update($id)
    {
        $this->validate();

        $category = PostCategory::findOrFail($id);
        $category->name = $this->nama_kategori;
        $category->slug_name = slug($this->nama_kategori);
        $category->save();

        $this->dispatchBrowserEvent('updated', 'Category berhasil diperbarui !');
        $this->emitTo('post.category.table', 'refreshTable');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.post.category.edit');
    }
}