<?php

namespace App\Http\Requests\Product;

use App\Models\Product\ProductTag;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductTagRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_tag_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
