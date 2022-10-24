<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckinDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkin_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('macheckin');
            $table->string('date');
            $table->string('checkin_time');
            $table->string('checkout_time')->nullable();
            $table->foreign('macheckin')->references('userId')->on('checkin')
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
        Schema::dropIfExists('checkin_data');
    }
}
