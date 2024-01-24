<?php

namespace App\Admin\Http\Requests\Admin;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class AdminRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'email' => ['required', 'email', 'unique:App\Models\Admin,email'],
            'fullname' => ['required', 'string'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/', 'unique:App\Models\Admin,phone'],
            'password' => ['required', 'string', 'confirmed'],
            'role' => ['required', Rule::in(collect(config('custom.admin.role'))->keys()->all())]
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Admin,id'],
            'email' => ['required', 'email', 'unique:App\Models\Admin,email,'.$this->id],
            'fullname' => ['required', 'string'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/', 'unique:App\Models\Admin,phone,'.$this->id],
            'password' => ['nullable', 'string', 'confirmed'],
            'role' => ['required', Rule::in(collect(config('custom.admin.role'))->keys()->all())]
        ];
    }
}