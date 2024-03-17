<?php

namespace MarJose123\SmsGateway\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FailedMessages extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'device',
        'message',
        'error_message',
        'error_at',
    ];

    protected $casts = [
        'id' => 'string',
        'error_at' => 'timestamp',
    ];
}
