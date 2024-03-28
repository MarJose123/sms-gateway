<?php

namespace MarJose123\SmsGateway\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeviceUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'sometimes', 'string'],
            'model' => ['nullable', 'sometimes', 'string', 'required'],
            'os' => ['nullable', 'sometimes', 'string', 'required'],
            'os_version' => ['nullable', 'sometimes', 'string', 'required'],
            'brand' => ['nullable', 'sometimes', 'string', 'required'],
            'device_uid' => ['required', 'sometimes', 'string', Rule::unique('devices')->ignore($this->id)],
            'device_mac' => ['nullable', Rule::unique('devices')->ignore($this->id), 'sometimes', 'string'],
            'manufacturer' => ['nullable', 'sometimes', 'string', 'required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
