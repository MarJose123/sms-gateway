<?php

namespace MarJose123\SmsGateway\Facades\Contracts\Interface;
use MarJose123\SmsGateway\Models\Devices as DeviceModel;
interface Device
{
    public function getAllDevices($limit=100, $offset=0);
    public function getDevices();
    public function getDevicesById(string $id);
    public function searchDevice(string $device, $limit=100, $offset=0);
    public function deleteDevice(string $device);
    public function createDevice(DeviceModel  $device);
    public function updateDevice(DeviceModel $device);
    public function patchDevice(DeviceModel $device);
}
