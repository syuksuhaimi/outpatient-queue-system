<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('queueId')->unsigned()->nullable();
            $table->string('room')->nullable();
            $table->integer('outpatientId')->unsigned()->nullable();
            $table->integer('staffId')->unsigned()->nullable();            
            $table->timestamps();

            $table->foreign('queueId')->references('queueId')->on('queue')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('outpatientId')->references('outpatientId')->on('outpatients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('staffId')->references('staffId')->on('clinicStaffs')->onUpdate('cascade')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calls');
    }
}
