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
        // 修改默认的 users 表结构
        // trojan 要用到的字段有 password, quota, download, upload 四个
        Schema::table('users', function (Blueprint $table) {
            $table->string('password', 56)->unique()->comment('这是 trojan 密码')->change();

            $table->string('login_password')->nullable(false)->comment('这是用户登录网站的密码');
            $table->boolean('is_admin')->default(false);
            $table->bigInteger('quota')->default(1024*1024*1024*20)->comment('每月限额,in Bytes');
            $table->unsignedBigInteger('download')->default(0);
            $table->unsignedBigInteger('upload')->default(0);
            $table->unsignedBigInteger('total_download')->default(0);
            $table->unsignedBigInteger('total_upload')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->change();
            $table->dropColumn('login_password');
            $table->dropColumn('is_admin');
            $table->dropColumn('quota');
            $table->dropColumn('download');
            $table->dropColumn('upload');
            $table->dropColumn('total_download');
            $table->dropColumn('total_upload');
        });
    }
};
