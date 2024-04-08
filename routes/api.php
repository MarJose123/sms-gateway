<?php

use MarJose123\SmsGateway\Http\Controllers\ContactsController;
use MarJose123\SmsGateway\Http\Controllers\DeviceController;
use MarJose123\SmsGateway\Http\Controllers\MessageController;
use MarJose123\SmsGateway\Http\Controllers\MessageFailedController;

Route::prefix('sms-gateway')
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::prefix('api/v1')->group(function () {
            Route::patch('/device/{id}', [DeviceController::class, 'patch']);
            Route::apiResource('devices', DeviceController::class);
            Route::patch('/message/{id}', [MessageController::class, 'patch']);
            Route::apiResource('messages', MessageController::class);
            Route::apiResource('messages.failed', MessageFailedController::class);
            Route::apiResource('contacts', ContactsController::class);
        });
    });
