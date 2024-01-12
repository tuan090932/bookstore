<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookComponent extends Component
{

    public $caTegory_type;

    /**
     * Create a new component instance.
     */
    public function __construct($caTegory_type)
    {
        $this->caTegory_type = $caTegory_type;
        dd($this->caTegory_type);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.book-component');
    }
}
