<?php

namespace Modules\Asset\Http\Requests;

use Modules\Asset\Entities\AssetsHistory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssetsHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('assets_history_create');
    }

    public function rules()
    {
        return [];
    }
}
