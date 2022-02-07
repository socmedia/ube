<?php

namespace App\Http\Livewire\Review;

use Livewire\Component;
use Modules\Review\Entities\Review;

class Overview extends Component
{
    public function render()
    {
        request()->routeIs('main.index') ? $limit = 5 : $limit = 15;
        return view('livewire.review.overview', [
            'reviews' => Review::getReviews()->limit($limit)->get(),
        ]);
    }
}