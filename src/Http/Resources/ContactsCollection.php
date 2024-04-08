<?php

namespace MarJose123\SmsGateway\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactsCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'count' => $this->count(),
                'self' => $request->fullUrl(),
            ],
        ];
    }
}
