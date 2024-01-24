<?php

namespace App\Admin\Http\Requests\Admin;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class AdminTransferCustomerRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'admin_from_id' => ['required', 'exists:App\Models\Admin,id'],
            'admin_to_id' => ['required', 'exists:App\Models\Admin,id']
        ];
    }
}