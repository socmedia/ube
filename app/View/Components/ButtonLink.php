<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonLink extends Component
{
    public $class, $link, $color;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class = '', $link = '', $color = 'secondary')
    {
        $this->class = $class;
        $this->link = $link;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button-link');
    }
}