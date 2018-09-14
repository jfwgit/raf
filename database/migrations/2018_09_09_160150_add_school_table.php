<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class AddSchoolTable extends Migration
{
    private static $tableName = 'schools';
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
            $table->string('location');
            $table->mediumText('data');
            $table->string('code');
            $table->integer('teachers');
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