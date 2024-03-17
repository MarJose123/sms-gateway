<?php

namespace MarJose123\SmsGateway\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    use HasUuids;

    protected $fillable = [
        'user',
        'name',
        'model',
        'os',
        'os_version',
        'brand',
        'device_uid',
        'device_mac',
        'manufacturer',
    ];

    protected $casts = [
        'id' => 'string',
        'device_mac' => 'string',
    ];
}
