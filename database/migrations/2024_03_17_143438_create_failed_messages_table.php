<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('failed_messages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('device');
            $table->foreignUuid('message');
            $table->text('error_message');
            $table->timestamp('error_at');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('failed_messages');
    }
};
