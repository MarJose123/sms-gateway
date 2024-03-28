<?php

namespace MarJose123\SmsGateway\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => ['required', 'string'],
            'user' => ['required', 'exists:users,id',],
            'send_to' => ['required', 'array'],
            'to_device' => ['required', 'exists:devices,id',],
        ];
    }
}
