<?php

namespace App\View\Components\Input;

class InputGallery extends Input
{
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'text', $value = '', $required = false)
    {
        //
        $this->required = $required;
        $this->type = $type;
        $this->value = $value;
    }
    public function marcoValue($value){
        if(gettype($value) == 'object'){
            return $value ? implode(',', $value->toArray()) : '';
        }
        return $value;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.gallery');
    }
}
