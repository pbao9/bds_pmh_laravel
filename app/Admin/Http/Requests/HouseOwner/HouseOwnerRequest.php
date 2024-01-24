<?php

namespace App\Admin\Http\Requests\HouseOwner;

use App\Http\Requests\Request;

class HouseOwnerRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'admin_id' => ['required', 'exists:App\Models\Admin,id'],
            'fullname' => ['required', 'string'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'address' => ['nullable'],
            'purpose' => ['required'],
            'note' => ['nullable'],
            'id_number' => ['nullable'],
            'id_date' => ['nullable'],
            'id_location' => ['nullable'],
            'location' => ['nullable'],
            'district_id' => ['nullable']

        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\HouseOwner,id'],
            'fullname' => ['required', 'string'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'address' => ['nullable'],
            'purpose' => ['required'],
            'note' => ['nullable'],
            'id_number' => ['nullable'],
            'id_date' => ['nullable'],
            'id_location' => ['nullable'],
            'location' => ['nullable'],
            'district_id' => ['nullable']

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