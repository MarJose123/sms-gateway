<?php

namespace MarJose123\SmsGateway\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FailedMessageStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'device' => ['required', 'exists:device,id'],
            'message' => ['required', 'exists:message,id'],
            'error_message' => ['required', 'string'],
            'error_at' => ['required', 'string'],
        ];
    }
}
