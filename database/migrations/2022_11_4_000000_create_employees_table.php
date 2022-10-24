<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('manv');
            $table->string('gioitinh');
            $table->string('tennv');
            $table->dateTime('ngaysinh');
            $table->string('diachi');
            $table->string('cmnd');
            $table->string('sdt');
            $table->string('macv');
            $table->string('mapb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
