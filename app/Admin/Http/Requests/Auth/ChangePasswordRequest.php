<?php

namespace App\Admin\Http\Requests\Auth;

use App\Http\Requests\Request;

class ChangePasswordRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    protected function methodPut()
    {
        return [
            'id' => ['required'],
            'old_password' =>['required', 'string'],
            'password' => ['required', 'string', 'max:255', 'confirmed'],
        ];
    }

    public function prepareForValidation()
    {
        $auth = auth()->guard('admin')->user();

        $this->merge([
            'id' => $auth->id,
            'hash_password' => $auth->password
        ]);
        
    }


}