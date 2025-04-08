<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use app\Models\User;

class send_message extends Component
{
    /**
     * Create a new component instance.
     */

    public $recipient;

    public function __construct(User $recipient)
    {
        //
        $this->recipient = $recipient;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.send_message');
    }
}
