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
        Schema::table('platform', function (Blueprint $table) {
            $table->boolean('state')->default(1)->after('name'); // Thay 'column_name' bằng tên cột hiện có mà bạn muốn thêm cột `state` sau nó.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('platform', function (Blueprint $table) {
            $table->dropColumn('state');
        });
    }
};
