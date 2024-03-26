<?php

namespace MarJose123\SmsGateway\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MarJose123\SmsGateway\Http\Requests\DeviceStoreRequest;
use MarJose123\SmsGateway\Http\Resources\DeviceCollection;
use MarJose123\SmsGateway\Models\Devices;

class DeviceController extends BaseController
{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $limit = $request->limit ?? $this->limit;
        $offset = $request->offset ?? $this->offset;

        $resp = $this->viewAll ? new DeviceCollection(Devices::limit($limit)
            ->offset($offset)) : new DeviceCollection(Auth::user()->devices());

        return response()->json($resp);
    }

    public function store(DeviceStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $resp = new DeviceCollection(Devices::create($request->validated()));

        return response()->json($resp);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $resp = $this->viewAll ? new DeviceCollection(Devices::findOrFail($id)) : new DeviceCollection(Devices::where([
            ['id', '=', $id],
            ['user', '=', Auth::user()->id],
        ]));

        return response()->json($resp);
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {

    }

    public function patch(Request $request, $id): \Illuminate\Http\JsonResponse
    {

    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $resp = $this->viewAll ? new DeviceCollection(Devices::findOrFail($id)->delete()) : new DeviceCollection(Devices::where([
            ['id', '=', $id],
            ['user', '=', Auth::user()->id],
        ])->delete());

        return response()->json($resp);
    }
}
