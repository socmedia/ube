<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $id, $title, $footer, $deleteModal;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = '', $title = '', $footer = '', $deleteModal = 'true')
    {
        $this->id = $id;
        $this->title = $title;
        $this->footer = $footer;
        $this->deleteModal = $deleteModal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}