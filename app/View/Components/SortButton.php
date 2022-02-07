<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SortButton extends Component
{
    public $order, $column, $sort;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($order = '', $column = '', $sort = '')
    {
        $this->order = $order;
        $this->column = $column;
        $this->sort = $sort;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sort-button');
    }
}
