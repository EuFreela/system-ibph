<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientscheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientschedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->text('comment');
            $table->integer('schedule_id')->unsigned();
            $table->timestamps();

            $table->foreign('schedule_id')
                ->references('id')->on('schedule')
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
        Schema::dropIfExists('clientschedule');
    }
}
