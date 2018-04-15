<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('password');
            $table->string('first_name');
            $table->string('surname');
            $table->date('dob');
            $table->string('gender');
            $table->string('passport')->unique();
            $table->integer('phone');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('type');
            $table->string('campus');
            $table->string('nationality');
            $table->string('optional_id')->unique();
            $table->text('note');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
