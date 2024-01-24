<?php

namespace App\Admin\Http\Requests\Land;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;
use App\Traits\Config;

class LandRequest extends Request
{
    use Config; //traitGetHouseOwnerPurpose
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'title' => ['required'],
            'admin_id' => ['required', 'exists:App\Models\Admin,id'],
            'category' => ['required', 'array'],
            'category.*' => ['required', 'exists:App\Models\Category,id'],
            'code' => ['required', 'string'],
            'type' => ['required', Rule::in($this->traitGetLandType())],
            'purpose' => ['required', Rule::in(array_keys($this->traitGetLandPurpose()))],
            'house_owner_id' => ['required', 'exists:App\Models\HouseOwner,id'],
            'status' => ['required', Rule::in($this->traitGetLandStatus())],
            'furniture' => ['required', Rule::in($this->traitGetLandFurniture())],
            'door_direction' => ['required', Rule::in($this->traitGetLandDoorDirection())],
            'area' => ['required', 'numeric'],
            'bedroom' => ['required', 'integer'],
            'toilet' => ['required', 'integer'],
            'floor' => ['required', 'integer'],
            'road_house' => ['nullable', 'numeric'],
            'price' => ['required', 'numeric'],
            'currency' => ['required', Rule::in($this->traitGetLandCurrency())],
            'level' => ['required', 'integer'],
            'district_id' => ['required', 'exists:App\Models\District,code'],
            'ward_id' => ['required', 'exists:App\Models\Ward,code'],
            'address' => ['nullable'],
            'note' => ['nullable'],
            'avatar' => ['required'],
            'image' => ['nullable'],
            'content' => ['nullable']
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Land,id'],
            'title' => ['required'],
            'category' => ['required', 'array'],
            'category.*' => ['required', 'exists:App\Models\Category,id'],
            'code' => ['required', 'string'],
            'type' => ['required', Rule::in($this->traitGetLandType())],
            'purpose' => ['required', Rule::in(array_keys($this->traitGetLandPurpose()))],
            'house_owner_id' => ['required', 'exists:App\Models\HouseOwner,id'],
            'status' => ['required', Rule::in($this->traitGetLandStatus())],
            'furniture' => ['required', Rule::in($this->traitGetLandFurniture())],
            'door_direction' => ['required', Rule::in($this->traitGetLandDoorDirection())],
            'area' => ['required', 'numeric'],
            'bedroom' => ['required', 'integer'],
            'toilet' => ['required', 'integer'],
            'floor' => ['required', 'integer'],
            'road_house' => ['nullable', 'numeric'],
            'price' => ['required', 'numeric'],
            'currency' => ['required', Rule::in($this->traitGetLandCurrency())],
            'level' => ['required', 'integer'],
            'district_id' => ['required', 'exists:App\Models\District,code'],
            'ward_id' => ['required', 'exists:App\Models\Ward,code'],
            'address' => ['nullable'],
            'note' => ['nullable'],
            'avatar' => ['required'],
            'image' => ['nullable'],
            'content' => ['nullable']
        ];
    }

    public function prepareForValidation()
    {
        if($this->method('POST')){
            $this->merge([
                'admin_id' => auth()->guard('admin')->user()->id
            ]);
        }
    }
}