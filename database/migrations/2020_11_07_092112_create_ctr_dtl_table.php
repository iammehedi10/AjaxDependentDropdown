<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtrDtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cricketer_detail', function (Blueprint $table) {
            $table->bigIncrements('cricketer_detail_id');
            $table->unsignedBigInteger('cricketer_id');
            $table->foreign('cricketer_id')->references('cricketer_id')->on('cricketer')->onDelete('cascade');
            $table->integer('odi_run');
            $table->integer('test_run');
            $table->integer('t20_run');
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
        Schema::dropIfExists('cricketer_detail');
    }
}
