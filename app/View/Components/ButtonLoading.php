<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonLoading extends Component
{
    public $color, $target, $additionalClass;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color = '', $target = 'save', $additionalClass = '')
    {
        $this->color = $color;
        $this->target = $target;
        $this->additionalClass = $additionalClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button-loading');
    }
}