<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationMakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_makers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();;
            $table->unique('user_id');
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            //$table->integer('individual_selects_id')->unsigned()->index()->nullable();
            //$table->integer('sector_selects_id')->unsigned()->index()->nullable();
            $table->date('send_date')->nullable();
            $table->time('send_time')->nullable();
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
        Schema::drop('notification_makers');
    }
}
