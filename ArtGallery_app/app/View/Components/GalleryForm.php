<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GalleryForm extends Component
{
    public $gallery;
    public $action;
    public $method;
    public $buttonText;

    /**
     * Create a new component instance.
     */
    public function __construct($gallery = null, $action = '', $method = 'POST', $buttonText = 'Save')
{
    $this->gallery = $gallery;
    $this->action = $action;
    $this->method = $method;
    $this->buttonText = $buttonText;
}
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.gallery-form');
    }
}
