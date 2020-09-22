<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model{
  protected $fillable = [
    'description', 'iframe', 'image',
  ];

  protected $guarded = [];

  /* public function getGetExcerptAttribute(){
    return substr($this->description, 0, 10);
  }
  
  public function getGetImageAttribute(){
    if($this->image){
      return url("public/questionImg/$this->image");
    }
  } */

  public function questionnaire(){
    return $this->belongsTo(Questionnaire::class);
  }

  public function answers(){
    return $this->hasMany(Answer::class);
  }

  public function responses(){
    return $this->hasMany(SurveyResponse::class);
  }
}
