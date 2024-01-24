<?php

namespace App\Traits;

trait Config
{

    private $trait;
    
    public function traitGetPostStatus() {
        return config('custom.post.status', []);
    }
    public function traitGetImageDefault() {
        return config('custom.images.default') ?? '';
    }
    public function traitGetSidebar() {
        return config('sidebar') ?? [];
    }
    public function traitGetmeetingStatus() {
        return config('custom.meeting.status') ?? [];
    }

    public function traitGetCategoryStatus() {
        return config('custom.category.status', []);
    }

    public function traitGetLandcurrency() {
        return config('custom.land.currency') ?? [];
    }

    public function traitGetLandDoorDirection() {
        return config('custom.land.door_direction') ?? [];
    }

    public function traitGetLandFurniture() {
        return config('custom.land.furniture') ?? [];
    }

    public function traitGetLandStatus() {
        return config('custom.land.status') ?? [];
    }

    public function traitGetLandPurpose() {
        return config('custom.land.purpose') ?? [];
    }

    public function traitGetLandType() {
        return config('custom.land.type') ?? [];
    }

    public function traitGetHouseOwnerPurpose() {
        return config('custom.house_owner.purpose') ?? [];
    }

    public function traitGetContractType() {
        return config('custom.contract.type') ?? [];
    }

    public function traitGetContractViewPdf() {
        return config('custom.contract.pdf_view') ?? [];
    }

    public function traitGetRoleAdmin(){

        $this->trait = config('custom.admin.role');

        if(auth()->guard('admin')->user()->role !='dev'){

        $this->trait = config('custom.admin.role');
            unset($this->trait['dev']);

        }
        return $this->trait;
    }
    public function traitGetAllRoleAdmin($role){

        return config('custom.admin.role')[$role] ?? '';
    }
    public function traitGetAvatar() {
        return config('custom.images.avatar') ?? '';
    }

    public function traitGetFavicon() {
        return config('custom.images.favicon') ?? '';
    }

    public function traitGetLogo() {
        return config('custom.images.logo') ?? '';
    }
    
}