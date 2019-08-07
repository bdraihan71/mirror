<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location');
            $table->string('tagline');
            $table->date('date_start');
            $table->date('date_end');
            $table->time('start');
            $table->time('end');
            $table->text('img_1');
            $table->text('img_2')->nullable();
            $table->text('img_3');
            $table->text('img_4');
            $table->text('img_5');
            $table->integer('ticket_number');
            $table->text('description');
            $table->boolean('deleted')->nullable();
            $table->boolean('featured')->default(false);
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
        Schema::dropIfExists('events');
    }
}
