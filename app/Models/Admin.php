<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['fullname', 'email', 'phone', 'address', 'password', 'role'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function loginLog(){
        return $this->hasMany(LoginLog::class, 'admin_id', 'id');
    }

    public function customer(){
        return $this->belongsToMany(Customer::class, 'admin_to_customer', 'admin_id', 'customer_id');
    }

    public function categories(){
        return $this->hasMany(Category::class, 'admin_id', 'id');
    }

    public function house_owner(){
        return $this->hasMany(HouseOwner::class, 'admin_id', 'id');
    }

    public function land(){
        return $this->hasMany(Land::class, 'admin_id', 'id');
    }

    public function contract(){
        return $this->hasMany(Contract::class, 'admin_id', 'id');
    }
}
