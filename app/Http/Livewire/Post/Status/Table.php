<?php

namespace App\Http\Livewire\Post\Status;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Post\Entities\PostStatus;

class Table extends Component
{
    use WithPagination;

    public $search, $deleteID;

    protected $listeners = [
        'refreshTable' => '$refresh',
    ];

    public function find($id)
    {
        $this->emitTo('post.status.edit', 'getID', $id);
    }

    public function getAll($search)
    {
        $statuses = PostStatus::orderBy('created_at', 'desc');

        if ($search !== '') {
            $statuses->where('name', 'like', '%' . $search . '%');
        }

        return $statuses->simplePaginate(10);
    }

    public function destroyStatus()
    {
        $status = PostStatus::findOrFail($this->deleteID);

        try {
            $status->forceDelete();
        } catch (Exception $exception) {
            $this->reset('deleteID');
            return $this->dispatchBrowserEvent('failed', 'Tipe postingan gagal dihapus, karena terdapat relasi pada database!');
        }

        $this->reset('deleteID');
        return $this->dispatchBrowserEvent('deleted', 'Tipe postingan berhasil dihapus !');
    }

    public function render()
    {
        return view('livewire.post.status.table', [
            'statuses' => $this->getAll($this->search),
        ]);
    }
}