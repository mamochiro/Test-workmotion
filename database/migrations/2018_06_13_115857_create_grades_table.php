<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Model;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->string('grade')->nullable();
            $table->timestamps();
        });

        Schema::table('grades', function(Blueprint $table){
             $table->foreign('subject_id')
                 ->references('id')->on('subjects')
                 ->onDelete('cascade');

             $table->foreign('users_id')
                 ->references('id')->on('users')
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
        Schema::dropIfExists('grades');
    }
}
