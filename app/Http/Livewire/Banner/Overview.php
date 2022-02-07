<?php

namespace App\Http\Livewire\Banner;

use Livewire\Component;
use Modules\Banner\Entities\Banner;

class Overview extends Component
{
    public function render()
    {
        return view('livewire.banner.overview', [
            'banners' => Banner::getBanners(),
        ]);
    }
}