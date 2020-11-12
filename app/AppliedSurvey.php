<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppliedSurvey extends Model{
    protected $fillable = ['user_id', 'questionnaire_id'];

  public function questionnaire(){
    return $this->belongsTo(Questionnaire::class);
  }

  public function responses(){
    return $this->hasMany(SurveyResponse::class);
  }
}
