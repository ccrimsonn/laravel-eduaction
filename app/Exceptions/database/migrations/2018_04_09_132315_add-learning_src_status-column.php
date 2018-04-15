<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLearningSrcStatusColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('audios', function($table){
            $table->string('status');
        });

        Schema::table('articles', function($table){
            $table->string('status');
        });

        Schema::table('assessments', function($table){
            $table->string('status');
        });

        Schema::table('videos', function($table){
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audios', function($table){
            $table->string('status');
        });

        Schema::table('articles', function($table){
            $table->string('status');
        });

        Schema::table('assessments', function($table){
            $table->string('status');
        });

        Schema::table('videos', function($table){
            $table->string('status');
        });
    }
}
