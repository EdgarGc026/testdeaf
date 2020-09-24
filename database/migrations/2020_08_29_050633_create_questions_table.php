<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration{
  public function up(){
    Schema::create('questions', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('questionnaire_id');
      $table->unsignedBigInteger('category_id');

      $table->text('description');
      $table->text('iframe');
      $table->text('image')->nullable();
      $table->timestamps();
    });
  }

  public function down(){
    Schema::dropIfExists('questions');
  }
}
