<?php

namespace MarJose123\SmsGateway\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevicePatchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'sometimes', 'string'],
            'model' => ['nullable', 'sometimes', 'string', 'required'],
            'os' => ['nullable', 'sometimes', 'string', 'required'],
            'os_version' => ['nullable', 'sometimes', 'string', 'required'],
            'brand' => ['nullable', 'sometimes', 'string', 'required'],
            'device_uid' => ['required', 'unique:devices,device_uid', 'sometimes', 'string'],
            'device_mac' => ['nullable', 'unique:devices,device_mac', 'sometimes', 'string'],
            'manufacturer' => ['nullable', 'sometimes', 'string', 'required'],
        ];
    }
}
