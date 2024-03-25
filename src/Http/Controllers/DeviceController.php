<?php

namespace MarJose123\SmsGateway\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MarJose123\SmsGateway\Http\Requests\DeviceStoreRequest;
use MarJose123\SmsGateway\Http\Resources\DeviceCollection;
use MarJose123\SmsGateway\Models\Devices;

class DeviceController extends BaseController
{
    public function index(Request $request): DeviceCollection
    {
        $limit = $request->limit ?? $this->limit;
        $offset = $request->offset ?? $this->offset;

        return $this->viewAll ? new DeviceCollection(Devices::limit($limit)
            ->offset($offset)) : new DeviceCollection(Auth::user()->devices());
    }

    public function store(DeviceStoreRequest $request): DeviceCollection
    {
        return new DeviceCollection(Devices::create($request->validated()));
    }

    public function show($id): DeviceCollection
    {
        return $this->viewAll ? new DeviceCollection(Devices::findOrFail($id)) : new DeviceCollection(Devices::where([
            ['id', '=', $id],
            ['user', '=', Auth::user()->id],
        ]));
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id): DeviceCollection
    {
        return $this->viewAll ? new DeviceCollection(Devices::findOrFail($id)->delete()) : new DeviceCollection(Devices::where([
            ['id', '=', $id],
            ['user', '=', Auth::user()->id],
        ])->delete());
    }
}
