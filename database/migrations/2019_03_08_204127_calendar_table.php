<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->string('title');
            $table->text('description');
            $table->dateTime('start_datetime'); //hora de inicio do evento
            $table->dateTime('end_datetime'); //hora de termino do evento
            $table->string('start'); //data inicio do evento
            $table->string('end'); //data fim do evento
            $table->timestamps();

            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendar');
    }
}
