<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SentMessages extends Component
{
    /**
     * Create a new component instance.
     */
    public $messages;

    public function __construct($messages)
    {
        $this->messages = $messages;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sent-messages');
    }
}
