<?php

namespace App\Http\Controllers;

use App\AppliedSurvey;
use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;

class SurveyController extends Controller{

  public function index(){
    //Traer todos los conjuntos (questionnaires) de la BD.
    //Crear un arreglo donde se guardan los cuestionarios que no han sido aplicados
    //Iterar en cada uno de ellos, donde se cheque si han sido respondidos o no por los usuarios
    //En caso de los examenes no hayan sido aplicados, se guarden en el arreglo y se rendericen en la vista.
    $questionnaires = Questionnaire::all();
    $questionnaireNotApplies = [];

    foreach ($questionnaires as $questionnaire){
      $appliedSurvey = AppliedSurvey::where([
        'user_id' => auth()->id(),
        'questionnaire_id' => $questionnaire->id
      ])->exists();

      if (!$appliedSurvey){
        $questionnaireNotApplies[] = $questionnaire;
      }
    }

    return view('survey.dashboard')->with('questionnaireNotApplies', $questionnaireNotApplies);
  }

  public function show($id){
    //Obenemos las preguntas y respuestas del examen.
    $questionnaires = Questionnaire::with('questions', 'questions.answers')->find($id);

    return view('survey.show', compact('questionnaires'));
  }

}
