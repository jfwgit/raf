<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSchoolIdToTeachers extends Migration
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
            $table->integer('school_id');
            $table->foreign('school_id')
                ->references('id')->on('schools')
                ->onDelete('cascade');
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
            $table->dropColumn('school_id');
        });
    }
}
