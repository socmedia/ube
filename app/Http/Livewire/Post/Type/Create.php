<?php

namespace App\Http\Livewire\Post\Type;

use Livewire\Component;
use Modules\Post\Entities\PostType;

class Create extends Component
{
    public $nama_tipe;

    protected $rules = [
        'nama_tipe' => 'required|min:3|max:191',
    ];

    public function store()
    {
        $this->validate();

        PostType::create([
            'name' => $this->nama_tipe,
            'slug_name' => slug($this->nama_tipe),
        ]);

        $this->dispatchBrowserEvent('created', 'Tipe postingan berhasil ditambahkan !');
        $this->emitTo('post.type.table', 'refreshTable');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.post.type.create');
    }
}