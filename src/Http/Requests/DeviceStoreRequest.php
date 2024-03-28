<?php

namespace MarJose123\SmsGateway\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user' => ['required', 'exists:users,id'],
            'name' => ['required'],
            'model' => ['nullable'],
            'os' => ['nullable'],
            'os_version' => ['nullable'],
            'brand' => ['nullable'],
            'device_uid' => ['required', 'unique:devices,device_uid'],
            'device_mac' => ['nullable', 'unique:devices,device_mac'],
            'manufacturer' => ['nullable'],
        ];
    }
}
