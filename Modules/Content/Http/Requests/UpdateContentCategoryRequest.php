<?php

namespace Modules\Content\Http\Requests;

use Modules\Content\Entities\ContentCategory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContentCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('content_category_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
