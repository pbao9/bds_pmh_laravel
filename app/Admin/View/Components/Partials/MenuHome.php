<?php

namespace App\Admin\View\Components\Partials;

use Illuminate\View\Component;
use App\Repositories\Land\LandRepositoryInterface;
use App\Admin\Services\Land\LandServiceInterface;
use App\Responses\ResponseInterface;
use App\Traits\Config;
use App\Models\Category;

class MenuHome extends Component
{
    /**
     * The alert type.
     *
     * @var array
     */
    public $type;
    /**
     * The alert title.
     *
     * @var string
     */
    public $title;
    /**
     * The alert position.
     *
     * @var string
     */
    public $position;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    use Config;
    public function __construct(
        LandRepositoryInterface $repository, 
        LandServiceInterface $service, 
        ResponseInterface $response 
    ){
        $this->repository = $repository;    
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->instance = $this->repository->getQueryBuilderSelectWithRelations([
            'id', 'district_id','purpose', 'slug'
        ], ['district:code,name,codename', 'category_to_land:category_id,land_id'])->get();
        $land = $this->instance->groupBy('purpose');
        $category_post = Category::with('address_post')->get();
        // dd($category->first()->address_post != null);
        return view('components.home.header.desktop', compact('land', 'category_post'));
    }
}   