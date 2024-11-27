<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Master extends Component
{
    /**
     * Global variables for layout configuration.
     */
    public $title;

    /**
     * Create a new component instance.
     */
    public function __construct(string $title = null)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.master', ['title' => $this->title]);
    }
}
