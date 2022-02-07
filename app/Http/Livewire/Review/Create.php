<?php

namespace App\Http\Livewire\Review;

use Livewire\Component;
use Modules\Review\Entities\Review;

class Create extends Component
{
    public $name, $review;

    protected $rules = [
        'name' => 'required|min:3|max:191',
        'review' => 'required|min:10',
    ];

    public function createReview()
    {
        $this->validate();

        Review::create([
            'name' => $this->name,
            'review' => $this->review,
            'is_active' => 1,
        ]);

        $this->dispatchBrowserEvent('created', 'Ulasan berhasil ditambahkan !');
        $this->emitTo('review.table', 'refreshTable');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.review.create');
    }
}