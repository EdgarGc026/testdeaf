<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnairesTable extends Migration{
  public function up(){
    Schema::create('questionnaires', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->string('title');
      $table->string('description');
      $table->timestamps();
    });
  }

  public function down(){
    Schema::dropIfExists('questionnaires');
  }
}
