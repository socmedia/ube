<?php

namespace App\Http\Livewire\FAQ;

use Livewire\Component;
use Modules\FAQ\Entities\FAQ;

class Edit extends Component
{
    public $faqID, $question, $answer;

    protected $rules = [
        'question' => 'required|min:3|max:191',
        'answer' => 'required|min:10',
    ];

    protected $listeners = ['getID' => 'findFAQ'];

    public function findFAQ($id)
    {
        $faq = FAQ::findOrFail($id);
        $this->faqID = $faq->id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
    }

    public function updateFAQ($id)
    {
        $this->validate();

        $faq = FAQ::findOrFail($id);
        $faq->question = $this->question;
        $faq->answer = $this->answer;
        $faq->save();

        $this->dispatchBrowserEvent('updated', 'FAQ berhasil diperbarui !');
        $this->emitTo('f-a-q.table', 'refreshTable');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.f-a-q.edit');
    }
}