<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTrainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_trainer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lessons_id')->unsigned();
            $table->integer('trainers_id')->unsigned();
            $table->foreign('lessons_id')->references('id')->on('lessons');
            $table->foreign('trainers_id')->references('id')->on('trainers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_trainer');
    }
}
