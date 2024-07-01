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
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->unique()->change();

            $table->datetime('expire_at', precision: 0)->comment('订阅过期时间');
            
            $table->string('trojan_token', 6)->comment('trojan_password = SHA224(name:trojan_token)');

            $table->string('subscription_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->change();
            $table->dropColumn('expire_at');
            $table->dropColumn('trojan_token');
            $table->dropColumn('subscription_token');
        });
    }
};
