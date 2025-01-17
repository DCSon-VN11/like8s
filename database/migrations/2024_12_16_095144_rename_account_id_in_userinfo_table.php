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
            $table->renameColumn('account_id', 'accountid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('userinfo', function (Blueprint $table) {
            $table->renameColumn('accountid', 'account_id');
        });
    }
};
