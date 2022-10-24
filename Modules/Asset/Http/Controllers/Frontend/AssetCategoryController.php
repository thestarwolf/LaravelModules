<?php

namespace Modules\Asset\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Modules\Asset\Http\Requests\MassDestroyAssetCategoryRequest;
use Modules\Asset\Http\Requests\StoreAssetCategoryRequest;
use Modules\Asset\Http\Requests\UpdateAssetCategoryRequest;
use Modules\Asset\Entities\AssetCategory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetCategories = AssetCategory::all();

        return view('asset::frontend.assetCategories.index', compact('assetCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('asset::frontend.assetCategories.create');
    }

    public function store(StoreAssetCategoryRequest $request)
    {
        $assetCategory = AssetCategory::create($request->all());

        return redirect()->route('frontend.asset-categories.index');
    }

    public function edit(AssetCategory $assetCategory)
    {
        abort_if(Gate::denies('asset_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('asset::frontend.assetCategories.edit', compact('assetCategory'));
    }

    public function update(UpdateAssetCategoryRequest $request, AssetCategory $assetCategory)
    {
        $assetCategory->update($request->all());

        return redirect()->route('frontend.asset-categories.index');
    }

    public function show(AssetCategory $assetCategory)
    {
        abort_if(Gate::denies('asset_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('asset::frontend.assetCategories.show', compact('assetCategory'));
    }

    public function destroy(AssetCategory $assetCategory)
    {
        abort_if(Gate::denies('asset_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetCategoryRequest $request)
    {
        AssetCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
