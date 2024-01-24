<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseOwner extends Model
{
    use HasFactory;
    
    protected $table = 'house_owner';

    protected $guarded = [];

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function land() {
        return $this->hasMany(Land::class, 'house_owner_id', 'id');
    }
    public function district(){

        return $this->belongsTo(District::class, 'district_id', 'code');
        
    }
}
