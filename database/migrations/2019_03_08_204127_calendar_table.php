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
            $table->string('description');
            $table->time('start_hour'); //hora de inicio do evento
            $table->time('end_hour'); //hora de termino do evento
            $table->date('start'); //data inicio do evento
            $table->date('end'); //data fim do evento
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
        Schema::dropIfExists('calendar');
    }
}
