<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queue', function (Blueprint $table) {
            $table->increments('queueId');
            $table->string('qType');
            $table->string('room')->nullable();
            $table->string('qTime')->nullable();
            $table->integer('outpatientId')->unsigned()->nullable();
            $table->integer('staffId')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('outpatientId')->references('outpatientId')->on('outpatients');
            $table->foreign('staffId')->references('staffId')->on('clinicStaffs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queue');
    }
}
