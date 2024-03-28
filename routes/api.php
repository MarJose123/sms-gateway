<?php

use MarJose123\SmsGateway\Http\Controllers\DeviceController;
use MarJose123\SmsGateway\Http\Controllers\MessageController;

Route::prefix('sms-gateway')
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::prefix('v1')->group(function () {
            Route::patch('/device/{id}', [DeviceController::class, 'patch']);
            Route::apiResource('devices', DeviceController::class);
            Route::patch('/message/{id}', [MessageController::class, 'patch']);
            Route::apiResource('messages', MessageController::class);
        });
    });
