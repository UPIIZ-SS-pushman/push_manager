<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('notification_logs', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('notification_id')->unsigned()->index();
          $table->integer('user_id')->unsigned()->index();
          $table->integer('status');
          $table->rememberToken();
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
        Schema::drop('notification_logs');
    }
}
