<?php

namespace App\Http\Livewire\Post\Type;

use Livewire\Component;
use Modules\Post\Entities\PostType;

class Edit extends Component
{
    public $typeID, $nama_tipe;

    protected $rules = [
        'nama_tipe' => 'required|min:3|max:191',
    ];

    protected $listeners = ['getID' => 'findType'];

    public function findType($id)
    {
        $type = PostType::findOrFail($id);
        $this->typeID = $type->id;
        $this->nama_tipe = $type->name;
    }

    public function update($id)
    {
        $this->validate();

        $type = PostType::findOrFail($id);
        $type->name = $this->nama_tipe;
        $type->slug_name = slug($this->nama_tipe);
        $type->save();

        $this->dispatchBrowserEvent('updated', 'Type berhasil diperbarui !');
        $this->emitTo('post.type.table', 'refreshTable');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.post.type.edit');
    }
}