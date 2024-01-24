<?php

namespace App\Policies;

use App\Models\HouseOwner;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class HouseOwnerPolicy
{
    use HandlesAuthorization;
    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\Admin  $admin
     * @param  string  $ability
     * @return void|bool
     */
    public function before(Admin $admin, $ability)
    {
        if ($admin->role == 'admin' || $admin->role == 'dev') {
            return true;
        }
    }
    /**
     * Determine whether the admin can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $admin)
    {
        //
        return true;
    }

    /**
     * Determine whether the admin can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\HouseOwner  $houseOwner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, HouseOwner $houseOwner)
    {
        //
        return $admin->id === $houseOwner->admin_id;
    }

    /**
     * Determine whether the admin can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $admin)
    {
        //
        return true;
    }

    /**
     * Determine whether the admin can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\HouseOwner  $houseOwner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, HouseOwner $houseOwner)
    {
        //
        return $admin->id === $houseOwner->admin_id;
    }

    /**
     * Determine whether the admin can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\HouseOwner  $houseOwner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, HouseOwner $houseOwner)
    {
        //
        return $admin->id === $houseOwner->admin_id;
    }

    /**
     * Determine whether the admin can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\HouseOwner  $houseOwner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, HouseOwner $houseOwner)
    {
        //
        return true;
    }

    /**
     * Determine whether the admin can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\HouseOwner  $houseOwner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, HouseOwner $houseOwner)
    {
        //
        return true;
    }
}
