<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class AddTeacherTable extends Migration
{
    private static $tableName = 'teachers';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(static::$tableName, function (Blueprint $table): void {
            $table->increments('id');
            $table->string('name');
            $table->string('photo')->nullable();
            $table->string('cv')->nullable();
            $table->mediumInteger('age')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->smallInteger('degree')->nullable();
            $table->smallInteger('certification')->nullable();
            $table->boolean('criminal_check')->nullable();
            $table->boolean('notarized')->nullable();
            $table->boolean('authenticated')->nullable();
            $table->string('desired_location')->nullable();
            $table->string('current_location')->nullable();
            $table->string('nationality')->nullable();
            $table->string('video')->nullable();
            $table->string('pref_school')->nullable();
            $table->string('experience')->nullable();
            $table->mediumInteger('salary_exp')->nullable();
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