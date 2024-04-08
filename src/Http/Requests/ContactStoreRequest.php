<?php

namespace MarJose123\SmsGateway\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'device' => ['required', 'string', 'sometimes',
                Rule::exists('devices', 'id'),
            ],
            'user' => ['required', 'exists:users,id'],
            'phone_number' => ['required', 'string',
                Rule::unique('contacts', function ($builder) {
                    $builder->where('user', '=', $this->user);
                })],

        ];
    }
}
