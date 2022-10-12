<?php

namespace App\View\Components;

use Illuminate\View\Component;

class livewireBtn extends Component
{
    public $forLoading;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($forLoading)
    {
        $this->forLoading = $forLoading;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.livewire-btn');
    }
}
