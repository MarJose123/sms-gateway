<?php

namespace MarJose123\SmsGateway\Commands;

use Illuminate\Console\Command;

class SmsGatewayCommand extends Command
{
    public $signature = 'sms-gateway';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
