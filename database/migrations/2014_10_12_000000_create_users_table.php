<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    private static $tableName = 'users';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(static::$tableName, function (Blueprint $table): void {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->smallInteger('role')->nullable();
            $table->rememberToken();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(static::$tableName);
    }
}