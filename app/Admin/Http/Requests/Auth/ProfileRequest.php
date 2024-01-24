<?php

namespace App\Admin\Http\Requests\Auth;

use App\Http\Requests\Request;

class ProfileRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Admin,id'],
            'fullname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/', 'unique:App\Models\Admin,phone,'.$this->id],
            'address' => ['nullable'],
            'password' => ['nullable'],
        ];
    }
}