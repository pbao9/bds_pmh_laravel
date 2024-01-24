<?php

namespace App\Admin\Http\Requests\Land;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class LandActionMultipleRecordRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'action' => ['required', Rule::in(['delete', 'restore', 'forceDelete'])],
            'id.*' => ['required']
        ];
    }
}