<?php

use MarJose123\SmsGateway\Http\Controllers\DeviceController;

Route::prefix('sms-gateway')
    ->middleware(['auth:api','auth:web'])
    ->group(function () {
        Route::apiResources([
            'devices' => DeviceController::class,
        ]);
});
