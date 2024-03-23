<?php

namespace MarJose123\SmsGateway\Http\Controllers;

use Illuminate\Http\Request;
use MarJose123\SmsGateway\Facades\Contracts\Interface\Device as DeviceInterface;
use MarJose123\SmsGateway\Http\Resources\DeviceCollection;

class DeviceController
{
    private DeviceInterface $device;

    public function __construct(DeviceInterface $device)
    {
        $this->device = $device;
    }

    public function index(): DeviceCollection
    {
        return new DeviceCollection($this->device->getAllDevices());
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
