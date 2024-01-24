<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Slug;

class Category extends Model
{
    use HasFactory, Slug;

    protected $table = 'categories';

    protected $guarded = [];

    public function address(){
        return $this->hasMany(CategoryToLand::class, 'category_id', 'id')->with('land');
    }

    public function address_post(){
        return $this->hasMany(CategoryToPost::class, 'category_id', 'id')->with('post');
    }
}
