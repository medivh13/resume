<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'api_token')) {
            Schema::table('users', function (Blueprint $table){
                $table->string('api_token',50)->nullable();
            });
        }
        if (!Schema::hasColumn('users', 'is_admin')) {
            Schema::table('users', function (Blueprint $table){
                $table->string('is_admin')->default(false);
            });
        }
        if (!Schema::hasColumn('users', 'reset_key')) {
            Schema::table('users', function (Blueprint $table){
                $table->string('reset_key', 10)->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('api_token');
            $table->dropColumn('is_admin');
            $table->dropColumn('reset_key');
        });
    }
}
