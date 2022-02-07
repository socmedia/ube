<?php

namespace App\Http\Livewire\Review;

use App\Traits\FileHandler;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Review\Entities\Review;

class Table extends Component
{
    use WithPagination, FileHandler;

    public $search, $deleteID, $video = '', $thumbnail = '';

    protected $listeners = [
        'refreshTable' => '$refresh',
    ];

    public function find($id)
    {
        $this->emitTo('review.edit', 'getID', $id);
        $this->emitTo('review.preview', 'getID', $id);
    }

    public function getAll($search)
    {
        $reviews = Review::orderBy('created_at', 'desc');

        if ($search !== '') {
            $reviews->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('review', 'like', '%' . $search . '%');
            });
        }

        return $reviews->simplePaginate(10);
    }

    public function destroyReview()
    {
        $review = Review::findOrFail($this->deleteID);
        $review->delete();

        $this->dispatchBrowserEvent('deleted', 'Ulasan berhasil dihapus !');
        $this->reset('deleteID');
    }

    public function updateStatus($id)
    {
        $review = Review::findOrFail($id);
        $review->is_active = $review->is_active === 1 ? 0 : 1;
        $review->save();

        $this->dispatchBrowserEvent('updated', 'Status ulasan berhasil diperbarui !');
    }

    public function render()
    {
        return view('livewire.review.table', [
            'reviews' => $this->getAll($this->search),
        ]);
    }
}