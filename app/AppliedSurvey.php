<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppliedSurvey extends Model{
    protected $fillable = ['user_id', 'questionnaire_id'];


}
