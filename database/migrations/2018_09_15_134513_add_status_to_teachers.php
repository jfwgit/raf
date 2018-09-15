<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToTeachers extends Migration
{
    /**
     * @var string
     */
    private static $usersTableName = 'teachers';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(static::$usersTableName, function (Blueprint $table): void {
            $table->smallInteger('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(static::$usersTableName, function (Blueprint $table): void {
            $table->dropColumn('status');
        });
    }
}
