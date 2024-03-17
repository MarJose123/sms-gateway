<?php

namespace MarJose123\SmsGateway\Http\Controllers;

use Illuminate\Http\Request;
use MarJose123\SmsGateway\Facades\Contracts\Interface\Device as DeviceInterface;

class DeviceController
{
    private DeviceInterface $device;

    public function __construct(DeviceInterface $device)
    {
        $this->device = $device;
    }

    public function index()
    {
        return $this->device->getAllDevices();
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
