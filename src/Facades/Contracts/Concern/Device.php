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

    public function getAllDevices($limit = 100, $offset = 0, $resultAsArray = true): array|Devices
    {

        $resp = $this->viewAll ?  Devices::limit($limit)
            ->offset($offset) : Auth::user()->devices();

        return  $resultAsArray ? $resp->get()->toArray() : $resp;
    }

    public function getDevices($resultAsArray = true): array|Devices
    {
        $resp = Auth::user()->devices();
        return  $resultAsArray ? $resp->get()->toArray() : $resp;
    }

    public function getDevicesById(string $id, $resultAsArray = true): array|Devices
    {
       $resp = $this->viewAll ?
           Devices::where('id', $id) :
           Devices::where([
           ['id', '=', $id],
           ['user', '=', Auth::user()->id]
       ]);

       return  $resultAsArray ? $resp->get()->toArray() : $resp->first();
    }

    public function searchDevice(string $device, $limit=100, $offset=0): array
    {
        return $this->viewAll ?
            Devices::query()
                ->orWhere('name', 'LIKE', "%{$device}%")
                ->orWhere('model', 'LIKE', "%{$device}%")
                ->orWhere('brand', 'LIKE', "%{$device}%")
                ->orWhere('manufacturer', 'LIKE', "%{$device}%")
                ->get()
                ->toArray() :
            Devices::query()
                ->where('user', '=', Auth::user()->id)
                ->orWhere('name', 'LIKE', "%{$device}%")
                ->orWhere('model', 'LIKE', "%{$device}%")
                ->orWhere('brand', 'LIKE', "%{$device}%")
                ->orWhere('manufacturer', 'LIKE', "%{$device}%")
                ->get()
                ->toArray();
    }

    public function deleteDevice(string $device)
    {
       if($this->viewAll){
           return Devices::find($device)?->delete();
       }
       return Devices::query()
           ->where('user', '=', Auth::user()->id)
           ->find($device)?->delete();
    }

    public function createDevice(Devices $device): bool
    {
        if($this->viewAll){
            return $device->save();
        }
        $device->user = Auth::user()->id;
        return $device->save();
    }

    public function updateDevice(Devices $device): bool
    {
        if($this->viewAll){
            return $device->save();
        }
        $device->user = Auth::user()->id;
        return $device->save();
    }

    public function patchDevice(Devices $device): bool
    {
        if($this->viewAll){
            return $device->save();
        }
        $device->user = Auth::user()->id;
        return $device->save();
    }
}
