<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration{
  public function up(){
    Schema::create('answers', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('question_id');

      $table->text('description');
      $table->text('iframe');
      $table->text('image')->nullable();
      $table->integer('is_correct');

      $table->foreign('question_id')->references('id')->on('questions')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->timestamps();
    });
  }

  public function down(){
    Schema::table('answers', function (Blueprint $table) {
      $table->dropForeign('answers_question_id_foreign');
      $table->dropColumn('question_id');
    });
    Schema::dropIfExists('answers');
  }
}
