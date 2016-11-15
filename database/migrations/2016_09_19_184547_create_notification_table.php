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
      Schema::create('notification', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('body');
          $table->date('sent');
          $table->date('created');
          $table->string('destination');
          $table->integer('sector_id');
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
        Schema::drop('notification');
    }
}
