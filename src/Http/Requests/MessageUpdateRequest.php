<?php

namespace MarJose123\SmsGateway\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => ['required', 'string', 'sometimes'],
            'send_to' => ['required', 'array', 'sometimes'],
            'to_device' => ['required', 'exists:devices,id', 'sometimes', 'string'],
        ];
    }
}
