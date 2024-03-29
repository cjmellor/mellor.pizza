<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('password', function (Blueprint $table) {
                $table->string('slug')->unique();
                $table->text('about')->nullable();
                $table->string('avatar')->nullable();
                $table->string('social_github')->nullable();
                $table->string('social_twitter')->nullable();
                $table->string('social_instagram')->nullable();
            });
        });
    }

    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('slug', 'about', 'avatar', 'social_github', 'social_twitter', 'social_instagram');
        });
    }
};
