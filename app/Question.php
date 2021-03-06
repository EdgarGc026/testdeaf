<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model{
  protected $fillable = [
    'questionnaire_id' ,'category_id', 'description', 'iframe', 'image',
  ];

  protected $guarded = [];

  public function questionnaire(){
    return $this->belongsTo(Questionnaire::class);
  }

  public function answers(){
    return $this->hasMany(Answer::class);
  }

  public function category(){
    return $this->belongsTo(Category::class);
  }

  public function responses(){
    return $this->hasMany(SurveyResponse::class);
  }
}
 /* public function getGetExcerptAttribute(){
    return substr($this->description, 0, 10);
  }
  
  public function getGetImageAttribute(){
    if($this->image){
      return url("public/questionImg/$this->image");
    }
  } */
