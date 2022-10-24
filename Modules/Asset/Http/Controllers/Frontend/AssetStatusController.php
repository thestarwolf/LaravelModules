<?php

namespace Modules\Asset\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Modules\Asset\Http\Requests\MassDestroyAssetStatusRequest;
use Modules\Asset\Http\Requests\StoreAssetStatusRequest;
use Modules\Asset\Http\Requests\UpdateAssetStatusRequest;
use Modules\Asset\Entities\AssetStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetStatuses = AssetStatus::all();

        return view('asset::frontend.assetStatuses.index', compact('assetStatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('asset::frontend.assetStatuses.create');
    }

    public function store(StoreAssetStatusRequest $request)
    {
        $assetStatus = AssetStatus::create($request->all());

        return redirect()->route('frontend.asset-statuses.index');
    }

    public function edit(AssetStatus $assetStatus)
    {
        abort_if(Gate::denies('asset_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('asset::frontend.assetStatuses.edit', compact('assetStatus'));
    }

    public function update(UpdateAssetStatusRequest $request, AssetStatus $assetStatus)
    {
        $assetStatus->update($request->all());

        return redirect()->route('frontend.asset-statuses.index');
    }

    public function show(AssetStatus $assetStatus)
    {
        abort_if(Gate::denies('asset_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('asset::frontend.assetStatuses.show', compact('assetStatus'));
    }

    public function destroy(AssetStatus $assetStatus)
    {
        abort_if(Gate::denies('asset_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetStatusRequest $request)
    {
        AssetStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
