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
        Schema::create('userinfo', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động tăng
            $table->string('name'); // Tạo cột tên người dùng
            $table->string('email')->nullable(); // Cột email có thể để trống
            $table->string('avata')->nullable(); // Cột avatar, có thể null
            $table->string('phone')->nullable(); // Cột số điện thoại, có thể null
            $table->foreignId('account_id')->constrained('account')->onDelete('cascade'); // Khóa ngoại đến bảng account
            $table->timestamps(); // Tạo cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userinfo');
    }
};
