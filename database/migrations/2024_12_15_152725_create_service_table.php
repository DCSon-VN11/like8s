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
        Schema::create('service', function (Blueprint $table) {
            $table->id(); // Khóa chính tự động tăng
            $table->string('name'); // Tên dịch vụ
            $table->foreignId('servicetypeid')->constrained('servicetype'); // Khóa ngoại đến bảng servicetype
            $table->foreignId('platformid')->constrained('platform'); // Khóa ngoại đến bảng platform
            $table->decimal('price', 10, 2); // Giá dịch vụ, định dạng số với 2 chữ số thập phân
            $table->boolean('state')->default(true); // Trạng thái dịch vụ (hoạt động hoặc không)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
