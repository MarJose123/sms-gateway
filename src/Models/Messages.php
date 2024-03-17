<?php

namespace MarJose123\SmsGateway\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Messages extends Model
{
    use SoftDeletes;
    use HasUuids;

    protected $fillable = [
        'message',
        'send_to',
        'to_device',
        'sent_at',
        'failed_at',
        'retry_count',
    ];

    protected $casts = [
        'id' => 'string',
        'send_to' => 'array',
        'sent_at' => 'timestamp',
        'failed_at' => 'timestamp',
    ];
}
