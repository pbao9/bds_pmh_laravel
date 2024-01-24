<?php

namespace App\Admin\View\Components\Partials;

use Illuminate\View\Component;
use App\Models\Category;
use App\Repositories\Land\LandRepositoryInterface;
use App\Admin\Services\Land\LandServiceInterface;
use App\Responses\ResponseInterface;
use App\Traits\Config;

class MenuHomeMobi extends Component
{
    public $type;
    public $title;
    public $position;
    use Config;
    public function __construct(
        LandRepositoryInterface $repository, 
        LandServiceInterface $service, 
        ResponseInterface $response 
    ){
        $this->repository = $repository;    
    }
    
    public function render()
    {
        $this->instance = $this->repository->getQueryBuilderSelectWithRelations([
            'id', 'district_id','purpose', 'slug'
        ], ['district:code,name,codename', 'category_to_land:category_id,land_id'])->get();
        $land = $this->instance->groupBy('purpose');
        $category_post = Category::with('address_post')->get();
        return view('components.home.header.mobi', compact('land', 'category_post'));
    }
}