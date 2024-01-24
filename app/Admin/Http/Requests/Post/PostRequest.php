<?php

namespace App\Admin\Http\Requests\Post;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;
use App\Traits\Config;

class PostRequest extends Request
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
            'category' => ['nullable', 'array'],
            'category.*' => ['nullable', 'exists:App\Models\Category,id'],
            'status' => ['required', Rule::in($this->traitGetPostStatus())],
            'avatar' => ['required'],
            'content' => ['nullable']
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Land,id'],
            'title' => ['required'],
            'admin_id' => ['required', 'exists:App\Models\Admin,id'],
            'category' => ['required', 'array'],
            'category.*' => ['required', 'exists:App\Models\Category,id'],
            'status' => ['required', Rule::in($this->traitGetPostStatus())],
            'avatar' => ['required'],
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