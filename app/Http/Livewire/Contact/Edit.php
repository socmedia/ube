<?php

namespace App\Http\Livewire\Contact;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Contact\Entities\Contact;
use Modules\Contact\Entities\ContactsAttribute;

class Edit extends Component
{
    use WithFileUploads;

    public $instagram, $email, $phone_1, $maps, $address, $showroom, $phone_2, $facebook, $whatsapp;

    public function mount()
    {
        $contact = ContactsAttribute::orderBy('id')->get()->toArray();

        $this->instagram = count($contact) > 0 ? $contact[0] : null;
        $this->email = count($contact) > 1 ? $contact[1] : null;
        $this->phone_1 = count($contact) > 2 ? $contact[2] : null;
        $this->maps = count($contact) > 3 ? $contact[3] : null;
        $this->address = count($contact) > 4 ? $contact[4] : null;
        $this->showroom = count($contact) > 5 ? $contact[5] : null;
        $this->phone_2 = count($contact) > 6 ? $contact[6] : null;
        $this->whatsapp = count($contact) > 7 ? $contact[7] : null;
        $this->facebook = count($contact) > 8 ? $contact[8] : null;
    }

    public function updateContact($id, $component)
    {
        $trim = strtolower(str_replace(' ', '_', $component));
        $contact = ContactsAttribute::where('id', $id)->firstOrFail();
        $contact->value = $this->$trim['value'];
        $contact->save();

        $this->dispatchBrowserEvent('updated', 'Kontak berhasil diperbarui !');
    }

    public function render()
    {
        return view('livewire.contact.edit');
    }
}