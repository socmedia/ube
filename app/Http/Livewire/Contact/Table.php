<?php

namespace App\Http\Livewire\Contact;

use Livewire\Component;
use Modules\Contact\Entities\ContactsAttribute;

class Table extends Component
{
    public $name, $mode, $attributeId, $deleteID;

    protected $rules = [
        'name' => 'required|min:3|max:191',
    ];

    public function changeMode($id)
    {
        $attribute = ContactsAttribute::find($id);
        $this->mode = 'edit';
        $this->attributeId = $id;
        $this->name = $attribute->attribute;
    }

    public function saveAttribute()
    {
        $this->validate();

        if ($this->mode) {
            $attribute = ContactsAttribute::find($this->attributeId);
            $attribute->attribute = $this->name;
            $attribute->save();
        } else {
            $attribute = new ContactsAttribute();
            $attribute->contacts_id = 1;
            $attribute->attribute = $this->name;
            $attribute->save();
        }

        $mode = $this->mode === 'edit' ? 'Atribut berhasil diperbarui.' : 'Atribut berhasil ditambahkan.';
        $this->dispatchBrowserEvent('created', $mode);
        $this->reset();
    }

    public function destroyBanner()
    {
        $attribute = ContactsAttribute::find($this->deleteID);
        $attribute->delete();
        $this->dispatchBrowserEvent('deleted', 'Atribut berhasil dihapus.');
        $this->reset();
    }

    public function getAll()
    {
        return ContactsAttribute::where('contacts_id', 1)->get();
    }

    public function render()
    {
        return view('livewire.contact.table', [
            'attributes' => $this->getAll(),
        ]);
    }
}