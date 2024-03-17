<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('devices', static function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('user');
            $table->string('name');
            $table->string('model')->nullable();
            $table->string('os')->nullable();
            $table->string('os_version')->nullable();
            $table->string('brand')->nullable();
            $table->string('device_uid')->nullable();
            $table->macAddress('device_mac')->nullable();
            $table->string('manufacturer')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
