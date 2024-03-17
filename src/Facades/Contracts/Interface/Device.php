<?php

namespace MarJose123\SmsGateway\Facades\Contracts\Interface;
interface Device
{
    public function getAllDevices($limit=100, $offset=0);
    public function getDevices();
    public function getDevicesById(string $id);
    public function getDevicesByDevice(string $device);
    public function deleteDevice(string $device);
    public function createDevice(string $device);
    public function updateDevice(string $device);
}
