<?php

namespace App\Admin\View\Components\Partials;

use Illuminate\View\Component;
use App\Traits\Config;

class Sidebar extends Component
{
    use Config;
    /**
     * The alert type.
     *
     * @var array
     */
    public $menu;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->menu = $this->traitGetSidebar();
        
    }

    public function routeName($routeName){
        return $routeName ? route($routeName) : '#';
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.partials.sidebar');
    }
}