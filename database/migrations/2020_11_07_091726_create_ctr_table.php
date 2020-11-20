<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cricketer', function (Blueprint $table) {
            $table->bigIncrements('cricketer_id');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('country_id')->on('country')->onDelete('cascade');
            $table->string('cricketer_name');
            $table->string('cricketer_role');
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
        Schema::dropIfExists('cricketer');
    }
}
