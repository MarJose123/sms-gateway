<?php

namespace MarJose123\SmsGateway\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Messages extends Model
{
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'message',
        'user',
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

    public function getStatusAttribute(): string
    {
        if (! $this->sent_at && ! $this->failed_at) {
            return 'Sending';
        }
        if ($this->sent_at && ! $this->failed_at) {
            return 'Sent';
        }
        if (! $this->sent_at && $this->failed_at) {
            return 'Failed';
        }
    }

    public function failedMessages(): HasMany
    {
        return $this->hasMany(FailedMessages::class, 'message');
    }
}
