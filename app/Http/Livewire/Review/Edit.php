<?php

namespace App\Http\Livewire\Review;

use Livewire\Component;
use Modules\Review\Entities\Review;

class Edit extends Component
{
    public $reviewID, $name, $review, $isActive;

    protected $rules = [
        'name' => 'required|min:3|max:191',
        'review' => 'required|min:10',
    ];

    protected $listeners = ['getID' => 'findReview'];

    public function findReview($id)
    {
        $review = Review::findOrFail($id);
        $this->reviewID = $review->id;
        $this->name = $review->name;
        $this->review = $review->review;
        $this->isActive = $review->is_active;
    }

    public function updateReview()
    {
        $this->validate();

        $review = Review::findOrFail($this->reviewID);
        $review->name = $this->name;
        $review->review = $this->review;
        $review->is_active = $this->isActive;
        $review->save();

        $this->dispatchBrowserEvent('updated', 'Review berhasil diperbarui !');
        $this->emitTo('review.table', 'refreshTable');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.review.edit');
    }
}