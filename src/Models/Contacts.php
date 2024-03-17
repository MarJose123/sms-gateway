<?php

namespace MarJose123\SmsGateway\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'device',
        'phone_number',
    ];

    protected $casts = [
        'id' => 'string',
        'device' => 'array'
    ];

}
