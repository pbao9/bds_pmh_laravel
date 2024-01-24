<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $table = 'customer';

    protected $guarded = [];

    public function admin(){
        return $this->belongsToMany(Admin::class, 'admin_to_customer', 'customer_id', 'admin_id');
    }

}
