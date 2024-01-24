<?php

namespace App\Admin\Http\Requests\Contract;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class ContractActionMultipleRecordRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'action' => ['required', Rule::in(['delete'])],
            'id.*' => ['required']
        ];
    }
}
