<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table
                ->text('two_factor_secret')
                ->after('remember_token')
                ->nullable();

            $table
                ->text('two_factor_recovery_codes')
                ->after('two_factor_secret')
                ->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('two_factor_secret', 'two_factor_recovery_codes');
        });
    }
};
