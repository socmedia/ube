<?php

namespace App\Http\Livewire\FAQ;

use Livewire\Component;
use Modules\FAQ\Entities\FAQ;

class Overview extends Component
{
    public function getAll()
    {
        request()->routeIs('main.index') ? $limit = 5 : $limit = 15;
        return FAQ::limit($limit)->get(['question', 'answer']);
    }

    public function render()
    {
        return view('livewire.f-a-q.overview', [
            'faqs' => $this->getAll(),
        ]);
    }
}