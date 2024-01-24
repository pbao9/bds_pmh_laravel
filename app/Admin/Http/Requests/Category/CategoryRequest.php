<?php

namespace App\Admin\Http\Requests\Category;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class CategoryRequest extends Request
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
            'name' => ['required', 'string'],
            'status' => ['required', 'integer'],
            'position' => ['required', 'integer']
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Category,id'],
            'name' => ['required', 'string'],
            'status' => ['required', 'integer'],
            'position' => ['required', 'integer']
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