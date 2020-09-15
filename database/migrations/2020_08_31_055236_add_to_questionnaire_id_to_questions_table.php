<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToQuestionnaireIdToQuestionsTable extends Migration{
  public function up(){
    Schema::table('questions', function (Blueprint $table) {
      $table->foreign('questionnaire_id')->references('id')->on('questionnaires')
        ->onDelete('cascade')
        ->onUpdate('cascade');
    });
  }
  public function down(){
    Schema::table('questions', function (Blueprint $table) {
        $table->dropForeign('questions_questionnaire_id_foreign');
        $table->dropColumn('questionnaire_id');
    });
  }
}
