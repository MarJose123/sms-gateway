<?php

namespace MarJose123\SmsGateway\Facades\Contracts\Interface;
use MarJose123\SmsGateway\Models\Devices as DeviceModel;
interface Device
{
    public function getAllDevices(int $limit=100, int $offset=0);
    public function getDevices(bool $resultAsArray = true);
    public function getDevicesById(string $id, bool $resultAsArray = true);
    public function searchDevice(string $device, int $limit=100, int $offset=0);
    public function deleteDevice(string $device);
    public function createDevice(DeviceModel  $device);
    public function updateDevice(DeviceModel $device);
    public function patchDevice(DeviceModel $device);
}
