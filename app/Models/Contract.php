<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Slug;

class Contract extends Model
{
    use HasFactory, Slug;
    
    protected $table = 'contracts';

    protected $casts = [
    ];

    protected $guarded = [];

}
