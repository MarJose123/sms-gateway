<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', static function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user')->index();
            $table->string('name');
            $table->json('device')->nullable()
                ->index()
                ->comment('contacts can be visible also to other devices if they are on present on the hardware.');
            $table->string('phone_number')->nullable();
            $table->timestamps();
        });

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

        Schema::create('failed_messages', static function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('device');
            $table->foreignUuid('message');
            $table->text('error_message');
            $table->timestamp('error_at');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('messages', static function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user');
            $table->text('message');
            $table->json('send_to')->comment('list of recipients');
            $table->string('to_device');
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('failed_at')->nullable();
            $table->integer('retry_count')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('devices');
        Schema::dropIfExists('failed_messages');
        Schema::dropIfExists('messages');
    }
};
