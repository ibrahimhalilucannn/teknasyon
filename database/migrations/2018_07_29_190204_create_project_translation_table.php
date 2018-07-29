<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTranslationTable extends Migration
{
    public function up()
    {
        Schema::create('project_translation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->string('key');
            $table->string('value');
            $table->integer('version_id');
            $table->integer('language_id');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_translation');
    }
}
