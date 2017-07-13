<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateC1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c1s', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name_c');
           $table->integer('c_id')->unsigned();
           $table->foreign('c_id')
           ->references('id')
           ->on('b1s')
           ->onDelete('cascade');
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
        Schema::drop('c1s');
    }
}
