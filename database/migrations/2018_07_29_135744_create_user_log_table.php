<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLogTable extends Migration
{
    public function up()
    {
        Schema::create('user_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('time');
            $table->string('type',50);
            $table->string('event');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_log');
    }
}
