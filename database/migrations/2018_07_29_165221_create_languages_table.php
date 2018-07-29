<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('code',5)->unique();
            $table->tinyInteger('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
