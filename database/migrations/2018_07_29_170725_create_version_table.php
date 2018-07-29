<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersionTable extends Migration
{
    public function up()
    {
        Schema::create('version', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',5)->unique();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('version');
    }
}
