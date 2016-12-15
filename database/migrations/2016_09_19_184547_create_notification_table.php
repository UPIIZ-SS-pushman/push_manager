<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('notifications', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('body');
          $table->dateTime('sent');
          //$table->string('destination');
          //$table->integer('sector_id')->unsigned()->index();
          $table->integer('notification_log_id')->unsigned()->index();
          // $table->rememberToken();
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
        Schema::drop('notifications');
    }
}
