<?php

namespace App\Http\Livewire\Post\Status;

use Livewire\Component;
use Modules\Post\Entities\PostStatus;

class Edit extends Component
{
    public $statusID, $nama_status;

    protected $rules = [
        'nama_status' => 'required|min:3|max:191',
    ];

    protected $listeners = ['getID' => 'findStatus'];

    public function findStatus($id)
    {
        $status = PostStatus::findOrFail($id);
        $this->statusID = $status->id;
        $this->nama_status = $status->name;
    }

    public function update($id)
    {
        $this->validate();

        $status = PostStatus::findOrFail($id);
        $status->name = $this->nama_status;
        $status->slug_name = slug($this->nama_status);
        $status->save();

        $this->dispatchBrowserEvent('updated', 'Status berhasil diperbarui !');
        $this->emitTo('post.status.table', 'refreshTable');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.post.status.edit');
    }
}