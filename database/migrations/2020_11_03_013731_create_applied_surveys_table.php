<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliedSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
      Schema::create('applied_surveys', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('questionnaire_id');
        $table->foreign('user_id')->references('id')->on('users')
          ->onDelete('cascade')
          ->onUpdate('cascade');

        $table->foreign('questionnaire_id')->references('id')->on('questionnaires')
          ->onDelete('cascade')
          ->onUpdate('cascade');

        $table->timestamps();
        });
    }

    public function down(){
      Schema::dropIfExists('applied_surveys');

    }
}
