<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model{
    protected $fillable = [
        'question_id', 'description', 'iframe', 'image', 'is_correct'
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function responses(){
        return $this->hasMany(SurveyResponse::class);
    }
}
