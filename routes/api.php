<?php

use MarJose123\SmsGateway\Http\Controllers\DeviceController;

Route::prefix('sms-gateway')
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::apiResources([
            'devices' => DeviceController::class,
        ]);
    });
