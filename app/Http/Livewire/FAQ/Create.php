<?php

namespace App\Http\Livewire\FAQ;

use Livewire\Component;
use Modules\FAQ\Entities\FAQ;

class Create extends Component
{
    public $question, $answer;

    protected $rules = [
        'question' => 'required|min:3|max:191',
        'answer' => 'required|min:10',
    ];

    public function createFAQ()
    {
        $this->validate();

        FAQ::create([
            'question' => $this->question,
            'answer' => $this->answer,
        ]);

        $this->dispatchBrowserEvent('created', 'FAQ berhasil ditambahkan !');
        $this->emitTo('f-a-q.table', 'refreshTable');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.f-a-q.create');
    }
}