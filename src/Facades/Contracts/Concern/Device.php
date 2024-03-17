<?php

namespace MarJose123\SmsGateway\Facades\Contracts\Concern;
use ErrorException;
use Illuminate\Support\Facades\Auth;
use \MarJose123\SmsGateway\Facades\Contracts\Interface\Device as DeviceInterface;
use MarJose123\SmsGateway\Models\Devices;

class Device implements DeviceInterface
{

    private bool $viewAll;

    /**
     * @throws ErrorException
     */
    public function __construct()
    {
        if(method_exists(\Auth::user(), 'devices')){
            throw new ErrorException('User Model must implement the HasDevice Traits and SmsPorter Interface');
        }

        $this->viewAll = Auth::user()->canSeeAll();
    }

    public function getAllDevices($limit = 100, $offset = 0): array
    {
        if($this->viewAll){
            return Devices::query()
                ->limit($limit)
                ->offset($offset)
                ->get();
        }
        return Auth::user()->devices();
    }

    public function getDevices()
    {
        // TODO: Implement getDevices() method.
    }

    public function getDevicesById(string $id)
    {
        // TODO: Implement getDevicesById() method.
    }

    public function getDevicesByDevice(string $device)
    {
        // TODO: Implement getDevicesByDevice() method.
    }

    public function deleteDevice(string $device)
    {
        // TODO: Implement deleteDevice() method.
    }

    public function createDevice(string $device)
    {
        // TODO: Implement createDevice() method.
    }

    public function updateDevice(string $device)
    {
        // TODO: Implement updateDevice() method.
    }
}
