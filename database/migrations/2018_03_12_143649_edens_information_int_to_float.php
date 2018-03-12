<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EdensInformationIntToFloat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edens_information', function (Blueprint $table) {
            $table->float('light', 8, 2)->change();
            $table->float('temperature', 8, 2)->change();
            $table->float('water', 8, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('edens_information', function (Blueprint $table) {
            $table->integer('light')->change();
            $table->integer('temperature')->change();
            $table->boolean('water')->change();
        });
    }
}
