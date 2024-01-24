<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Slug;

class Land extends Model
{
    use HasFactory, SoftDeletes, Slug;
    
    protected $table = 'land';

    protected $casts = [
        'image' => AsArrayObject::class
    ];

    protected $guarded = [];

    public function admin(){

        return $this->belongsTo(Admin::class, 'admin_id', 'id');
        
    }
    
    public function categories(){
        return $this->belongsToMany(Category::class, 'category_to_land', 'land_id', 'category_id');
    }

    public function house_owner(){

        return $this->belongsTo(HouseOwner::class, 'house_owner_id', 'id');
        
    }

    public function districtWithWard(){

        return $this->belongsTo(District::class, 'district_id', 'code')->with('ward:code,name,district_code');
        
    }

    public function district(){

        return $this->belongsTo(District::class, 'district_id', 'code');
        
    }

    public function ward(){

        return $this->belongsTo(Ward::class, 'ward_id', 'code');
        
    }

    public function category_to_land(){

        return $this->hasMany(CategoryToLand::class, 'land_id', 'id')->with('category');
        
    }
}
