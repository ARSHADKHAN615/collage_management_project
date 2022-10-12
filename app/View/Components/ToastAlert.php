<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ToastAlert extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $type;
    public $icon;
    /**
     * The alert message.
     *
     * @var string
     */
    public $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $message, $icon)
    {
        $this->type = $type;
        $this->message = $message;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.toast-alert');
    }
}
