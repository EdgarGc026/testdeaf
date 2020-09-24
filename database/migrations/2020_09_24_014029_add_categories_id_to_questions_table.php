<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriesIdToQuestionsTable extends Migration{

  public function up(){
    Schema::table('questions', function (Blueprint $table) {
      $table->foreign('category_id')->references('id')->on('categories')
        ->onDelete('cascade')
        ->onUpdate('cascade');
    });
  }

  public function down(){
    Schema::table('questions', function (Blueprint $table) {
        $table->dropForeign('questions_category_id_foreign');
        $table->dropColumn('category_id');
    });
  }
}
