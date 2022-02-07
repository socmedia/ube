<?php

namespace App\Http\Livewire\Post\Type;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Post\Entities\PostType;

class Table extends Component
{
    use WithPagination;

    public $search, $deleteID;

    protected $listeners = [
        'refreshTable' => '$refresh',
    ];

    public function find($id)
    {
        $this->emitTo('post.type.edit', 'getID', $id);
    }

    public function getAll($search)
    {
        $types = PostType::orderBy('created_at', 'desc');

        if ($search !== '') {
            $types->where('name', 'like', '%' . $search . '%');
        }

        return $types->simplePaginate(10);
    }

    public function destroyType()
    {
        $type = PostType::findOrFail($this->deleteID);

        try {
            $type->forceDelete();
        } catch (Exception $exception) {
            $this->reset('deleteID');
            return $this->dispatchBrowserEvent('failed', 'Tipe postingan gagal dihapus, karena terdapat relasi pada database!');
        }

        $this->reset('deleteID');
        return $this->dispatchBrowserEvent('deleted', 'Tipe postingan berhasil dihapus !');
    }

    public function render()
    {
        return view('livewire.post.type.table', [
            'types' => $this->getAll($this->search),
        ]);
    }
}