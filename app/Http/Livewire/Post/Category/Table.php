<?php

namespace App\Http\Livewire\Post\Category;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Post\Entities\PostCategory;

class Table extends Component
{
    use WithPagination;

    public $search, $deleteID;

    protected $listeners = [
        'refreshTable' => '$refresh',
    ];

    public function find($id)
    {
        $this->emitTo('post.category.edit', 'getID', $id);
    }

    public function getAll($search)
    {
        $categories = PostCategory::orderBy('created_at', 'desc');

        if ($search !== '') {
            $categories->where('name', 'like', '%' . $search . '%');
        }

        return $categories->simplePaginate(10);
    }

    public function destroyCategory()
    {
        $category = PostCategory::findOrFail($this->deleteID);

        try {
            $category->forceDelete();
        } catch (Exception $exception) {
            $this->reset('deleteID');
            return $this->dispatchBrowserEvent('failed', 'Tipe postingan gagal dihapus, karena terdapat relasi pada database!');
        }

        $this->reset('deleteID');
        return $this->dispatchBrowserEvent('deleted', 'Tipe postingan berhasil dihapus !');
    }

    public function render()
    {
        return view('livewire.post.category.table', [
            'categories' => $this->getAll($this->search),
        ]);
    }
}