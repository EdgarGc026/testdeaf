<?php

namespace App\Http\Controllers;
use App\Http\Requests\QuestionnaireStoreRequest;
use App\Http\Requests\QuestionnaireUpdateRequest;
use App\Questionnaire;

class QuestionnaireController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $questionnaires = Questionnaire::all();
    return view('questionnaire.index', compact('questionnaires'));
  }

  public function create(){
    return view('questionnaire.create');
  }

  public function store(QuestionnaireStoreRequest $request){
    $questionnaires = new Questionnaire;
    $questionnaires->title = $request->get('title');
    $questionnaires->description = $request->get('description');
    $questionnaires->user_id = auth()->user()->id;

    $questionnaires->save();
    return redirect()->route('questionnaires.index')
      ->with('status', 'Examen creado con exito');
  }

  public function show(){
    $questionnaires = Questionnaire::all();
    $questionnaires->load('questions');

    return view('questionnaire.show', compact('questionnaires'));
  }

  public function edit($id){
    $questionnaires = Questionnaire::findOrFail($id);
    return view('questionnaire.edit', compact('questionnaires'));
  }

  public function update(QuestionnaireUpdateRequest $request, $id){
    $questionnaires = Questionnaire::findOrFail($id);
    $questionnaires->title = $request->get('title');
    $questionnaires->description =$request->get('description');

    $questionnaires->save();
    return redirect()->route('questionnaires.index')
      ->with('status', 'Examen actualizado con exito');
  }

  public function destroy($id){
    $questionnaires = Questionnaire::findOrFail($id);
    $questionnaires->delete();
    return redirect()->route('questionnaires.index');
  }

  public function confirmDelete($id){
    $questionnaires = Questionnaire::findOrFail($id);
    return view('questionnaire.confirmDelete', compact('questionnaires'));
  }
}
