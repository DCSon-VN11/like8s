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
        Schema::create('contact', function (Blueprint $table) {
            $table->id(); // Khóa chính tự động tăng
            $table->string('name', 255); // Tên người liên hệ
            $table->string('avatar', 255)->nullable(); // URL ảnh đại diện (có thể để trống)
            $table->string('phone', 20)->unique(); // Số điện thoại (đảm bảo duy nhất)
            $table->enum('role', ['admin', 'đại lý']); // Vai trò: admin hoặc đại lý
            $table->string('linktelegram', 255)->nullable(); // Link Telegram (có thể để trống)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
