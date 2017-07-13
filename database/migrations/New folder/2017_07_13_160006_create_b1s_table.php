<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateB1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b1s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_b');
            $table->integer('b_id')->unsigned();
            $table->foreign('b_id')
            ->references('id')
            ->on('a1s')
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
        Schema::drop('b1s');
    }
}
