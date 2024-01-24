<?php

namespace App\Admin\Http\Requests\Customer;

use App\Http\Requests\Request;

class CustomerRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'fullname' => ['required', 'string'],
            'id_number' => ['nullable', 'integer'],
            'id_date' => ['nullable', 'date_format:Y-m-d'],
            'id_location' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'birthday' => ['nullable', 'date_format:Y-m-d'],
            'major' => ['required', 'string'],
            'address' => ['nullable'],
            'zalo' => ['nullable'],
            'facebook' => ['nullable'],
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Customer,id'],
            'fullname' => ['required', 'string'],
            'id_number' => ['nullable', 'integer'],
            'id_date' => ['nullable', 'date_format:Y-m-d'],
            'id_location' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'birthday' => ['nullable', 'date_format:Y-m-d'],
            'major' => ['required', 'string'],
            'address' => ['nullable'],
            'zalo' => ['nullable'],
            'facebook' => ['nullable'],
        ];
    }
}