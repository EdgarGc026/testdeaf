<?php

namespace App\Http\Controllers;
use App\Answer;
use App\Question;
use App\Questionnaire;
use App\Http\Requests\QuestionStoreRequest;
use App\Http\Requests\QuestionUpdateRequest;


class QuestionController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index($id){
    $questionnaires = Questionnaire::findOrFail($id);
    return view('question.index', compact('questionnaires'));
  }

  public function create($id){
    $questionnaires = Questionnaire::find($id);
    return view('question.create', compact('questionnaires'));
  }

  public function store(QuestionStoreRequest $request){
    $questions = new Question;
    $questions->questionnaire_id = $request->input('questionnaire_id');
    $questions->description = $request->input('question.description');
    $questions->iframe = $request->input('question.iframe');
    if($request->hasFile('question.image')){
      $questions->image = $request->file('question.image')->store('questionImg', 'public');
    }
    $questions->save();

    //Trae una collecion de inputs en los answers.
    $answers = $request->input('answers');
    foreach($answers as $i => $answer){
      if($request->hasFile("answers.$i.image")){
        $answer['image'] = $request->file("answers.$i.image")->store('answersImg', 'public');
      }
      
      $answer['question_id'] = $questions->id;
      Answer::create($answer);
    }
    
    return redirect()->route('questions.index', $questions->questionnaire_id);
  }

  public function edit($questionnaireId, $questionId){
    $questionnaires = Questionnaire::findOrFail($questionnaireId);
    $question = Question::with('answers')->findOrFail($questionId);
    
    return view('question.edit', compact('questionnaires', 'question'));
  }

  public function update(QuestionUpdateRequest $request, $questionnaireId, $questionId){
    $questions = Question::findOrFail($questionId);

    $questions->description = $request->input('question.description');
    $questions->iframe = $request->input('question.iframe');
    if($request->hasFile('question.image')){
      $questions->image = $request->file('question.image')->store('questionImg', 'public');
    }
    $questions->save();

    //Trae una collecion de inputs en los answers.
    $answers = $request->input('answers');
    foreach($answers as $i => $answer){
      if($request->hasFile("answers.$i.image")){
        $answer['image'] = $request->file("answers.$i.image")->store('answersImg', 'public');
      }
      Answer::where('id', $answer['id'])->update($answer);
    }

    return redirect()->route('questions.index', $questions->questionnaire_id);
  }

  public function show($questionnaireId, $questionId){
    $questionnaires = Questionnaire::findOrFail($questionnaireId);
    $questions = Question::with('answers')->findOrFail($questionId);

    return view('question.show', compact('questionnaires','questions'));
  }

  public function confirmDelete($questionnaireId, $questionId){
    $questionnaires = Questionnaire::findOrFail($questionnaireId);
    $questions = Question::findOrFail($questionId);

    return view('question.confirmDelete', compact('questionnaires', 'questions'));
  }

  public function destroy($questionnaireId, $questionId){
    $questionnaires = Questionnaire::findOrFail($questionnaireId);
    $questions = Question::findOrFail($questionId);

    $questions->delete();
    return redirect()->route('questions.index', $questions->questionnaire_id);
  }
}

