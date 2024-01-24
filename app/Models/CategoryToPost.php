<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Slug;

class CategoryToPost extends Model
{
    use HasFactory, Slug;

    protected $table = 'category_to_land';

    protected $guarded = [];

    public function post(){
        return $this->belongsTo(Post::class, 'land_id', 'id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
