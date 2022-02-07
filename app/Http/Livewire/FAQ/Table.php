<?php

namespace App\Http\Livewire\FAQ;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\FAQ\Entities\FAQ;

class Table extends Component
{
    use WithPagination;

    public $search, $deleteID;

    protected $listeners = [
        'refreshTable' => '$refresh',
    ];

    public function find($id)
    {
        $this->emitTo('f-a-q.edit', 'getID', $id);
    }

    public function getAll($search)
    {
        $faqs = FAQ::orderBy('created_at', 'desc');

        if ($search !== '') {
            $faqs->where(function ($q) use ($search) {
                $q->where('question', 'like', '%' . $search . '%')
                    ->where('answer', 'like', '%' . $search . '%');
            });
        }

        return $faqs->simplePaginate(10);
    }

    public function destroyFAQ($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();
        $this->dispatchBrowserEvent('deleted', 'FAQ berhasil dihapus !');
        $this->reset('deleteID');
    }

    public function render()
    {
        return view('livewire.f-a-q.table', [
            'faqs' => $this->getAll($this->search),
        ]);
    }
}