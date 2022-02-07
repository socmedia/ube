<?php

namespace App\Http\Livewire\Post\Status;

use Livewire\Component;
use Modules\Post\Entities\PostStatus;

class Create extends Component
{
    public $nama_status;

    protected $rules = [
        'nama_status' => 'required|min:3|max:191',
    ];

    public function store()
    {
        $this->validate();

        PostStatus::create([
            'name' => $this->nama_status,
            'slug_name' => slug($this->nama_status),
        ]);

        $this->dispatchBrowserEvent('created', 'Status postingan berhasil ditambahkan !');
        $this->emitTo('post.status.table', 'refreshTable');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.post.status.create');
    }
}