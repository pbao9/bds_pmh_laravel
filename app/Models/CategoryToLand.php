<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Slug;

class CategoryToLand extends Model
{
    use HasFactory, Slug;

    protected $table = 'category_to_land';

    protected $guarded = [];

    public function land(){
        return $this->belongsTo(Land::class, 'land_id', 'id')->with('house_owner');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
