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
        Schema::create('account', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự tăng
            $table->string('username')->unique(); // Tạo cột username, phải là duy nhất
            $table->string('password'); // Tạo cột password
            $table->enum('state', ['active', 'inactive'])->default('active');
            $table->timestamps(); // Tạo các cột created_at và updated_at
            $table->enum('role', ['user', 'admin'])->default('user'); // Tạo cột role với các giá trị 'user', 'admin', 'moderator'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
