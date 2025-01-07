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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accountid')->constrained('account'); // Khóa ngoại đến bảng account
            $table->foreignId('serviceid')->constrained('service'); // Khóa ngoại đến bảng service
            $table->integer('amount'); // Số lượng dịch vụ được đặt
            $table->decimal('money', 15, 2); // Tổng số tiền phải trả (định dạng số với 2 chữ số thập phân)
            $table->text('note')->nullable(); // Ghi chú (có thể để trống)
            $table->boolean('state')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
