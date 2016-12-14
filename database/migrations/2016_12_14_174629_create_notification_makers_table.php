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
            $table->string('user_id');
            $table->unique('user_id');
            $table->string('title');
            $table->string('body');
            $table->integer('individual_selects_id')->unsigned()->index();
            $table->integer('group_selects_id')->unsigned()->index();
            $table->date('send_date');
            $table->time('send_time');
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
