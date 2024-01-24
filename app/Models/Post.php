<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Slug;

class Post extends Model
{
    use HasFactory, Slug;

    protected $table="posts";

    protected $guarded = [];

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_to_post', 'post_id', 'category_id');
    }
}
