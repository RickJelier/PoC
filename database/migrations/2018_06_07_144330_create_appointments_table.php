<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
	    $table->string('postal');
	    $table->string('address');
	    $table->string('city');
	    $table->date('start_date');
	    $table->date('end_date')->nullable();
	    $table->time('start_time')->nullable();
	    $table->time('end_time')->nullable();
            $table->integer('kilometers')->nullable();
            $table->integer('description')->nullable();
            $table->integer('user_id')->unsigned()->index();
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
        Schema::dropIfExists('appointments');
    }
}
