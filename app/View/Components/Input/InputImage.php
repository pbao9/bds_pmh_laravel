<?php

namespace App\View\Components\Input;
use App\Traits\Config;

class InputImage extends Input
{
    use Config;

    public $value;

    public $showImage;

    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($showImage, $name, $type = 'text', $value = '', $required = false)
    {
        //
        $this->showImage = $showImage;
        $this->name = $name;
        $this->required = $required;
        $this->type = $type;
        $this->value = $value ?? $this->traitGetImageDefault();
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.image');
    }
}
