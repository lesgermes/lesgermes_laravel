<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdensInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edens_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eden')->unsigned();
            $table->integer('light');
            $table->integer('temperature');
            $table->boolean('water');
            $table->timestamps();

            $table->foreign('eden')->references('id')->on('edens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edens_information');
    }
}
