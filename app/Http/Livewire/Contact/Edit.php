<?php

namespace App\Http\Livewire\Contact;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Contact\Entities\Contact;
use Modules\Contact\Entities\ContactsAttribute;

class Edit extends Component
{
    use WithFileUploads;

    public $instagram, $email, $phone_1, $maps, $address, $phone_2, $facebook, $whatsapp, $catalogue, $oldCatalogue;

    public function mount()
    {
        $contact = ContactsAttribute::orderBy('id')->get()->toArray();

        $this->instagram = count($contact) > 0 ? $contact[0] : null;
        $this->email = count($contact) > 1 ? $contact[1] : null;
        $this->phone_1 = count($contact) > 2 ? $contact[2] : null;
        $this->maps = count($contact) > 3 ? $contact[3] : null;
        $this->address = count($contact) > 4 ? $contact[4] : null;
        $this->phone_2 = count($contact) > 5 ? $contact[5] : null;
        $this->whatsapp = count($contact) > 6 ? $contact[6] : null;
        $oldCatalogue = count($contact) > 7 ? $contact[7] : null;
        $this->facebook = count($contact) > 8 ? $contact[8] : null;

        $catalogueArr = explode('/', $oldCatalogue['value']);
        $catalogueName = end($catalogueArr);
        $this->oldCatalogue = $oldCatalogue;
        $this->oldCatalogue['name'] = $catalogueName;
    }

    public function updateContact($id, $component)
    {
        $trim = strtolower(str_replace(' ', '_', $component));
        $contact = ContactsAttribute::where('id', $id)->firstOrFail();
        if ($component === 'Catalogue') {
            $contact->value = $this->catalogue->store('files/catalogue', 'public');
        } else {
            $contact->value = $this->$trim['value'];
        }
        $contact->save();

        $this->dispatchBrowserEvent('updated', 'Kontak berhasil diperbarui !');
    }

    public function render()
    {
        return view('livewire.contact.edit');
    }
}