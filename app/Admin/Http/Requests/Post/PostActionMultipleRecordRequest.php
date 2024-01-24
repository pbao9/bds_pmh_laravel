<?php

namespace App\Admin\Http\Requests\Post;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class PostActionMultipleRecordRequest extends Request
{
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