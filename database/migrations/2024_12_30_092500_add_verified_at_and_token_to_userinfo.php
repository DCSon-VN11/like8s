<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('userinfo', function (Blueprint $table) {
            $table->timestamp('verified_at')->nullable(); // Thời gian xác thực
            $table->string('token')->nullable(); // Mã xác thực email
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('userinfo', function (Blueprint $table) {
            $table->dropColumn(['verified_at', 'token']);
        });
    }
};