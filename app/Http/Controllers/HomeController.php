<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Land\LandRepositoryInterface;
use App\Admin\Services\Land\LandServiceInterface;
use App\Responses\ResponseInterface;
use App\Traits\Config;
use App\Models\Category;
use Carbon\Carbon;

use App\Models\Land;

class HomeController extends Controller
{   
    use Config;
    public function __construct(
        LandRepositoryInterface $repository, 
        LandServiceInterface $service, 
        ResponseInterface $response 
    ){
        $this->setView();
        $this->repository = $repository;    
        $this->service = $service;
        $this->response = $response;
    }

    public function getView(){
        return [
            'index' => 'home.homepage.index',
            'search' => 'home.search.index',
        ];
    }

    public function index(){
        $this->instance = $this->repository->getQueryBuilderSelectWithRelations([
            'id', 'house_owner_id', 'avatar', 'purpose', 'title', 'price','slug', 'created_at', 'area', 'district_id'
        ], ['house_owner:id,fullname' , 'district:code,name,codename'])->get();
        $category = Category::with('address')->get();
        //dd($category->first()->address->first()->land);
        return $this->response->viewRequired($this->view['index'],
            [
                'land' => $this->instance,
                'today' => Carbon::now(),
                'category' => $category,
            ], ['land']
        );
    }

    public function timKiem(Request $request)
    {
        if ($request->ajax()) {
            $land = Land::where('title', 'LIKE', '%'.$request->keyword. '%')->with('district','category_to_land')->get();
            return response()->json(['land'=>$land]);
        }
    }
    
    

    public function ketquaview () {
        return redirect()->route('home');
    }

    public function ketquatimkiem (Request $request) 
    {
        $land = Land::where('title', 'LIKE', '%'.$request->keyword. '%')->with('district')->get();
        return $this->response->viewRequired($this->view['search'], [
            'land' => $land,
            'result' => $request->keyword,
            'category' => null
        ], 
        ['land']);
    }
}
