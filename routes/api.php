<?php

use MarJose123\SmsGateway\Http\Controllers\DeviceController;

Route::prefix('sms-gateway')
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::prefix('v1')->group(function () {
            Route::patch('/devices/{device}', [DeviceController::class, 'patch']);
            Route::apiResource('device', DeviceController::class);
        });
    });
