<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\AnswerStoreRequest;
use Illuminate\Http\AnswerUpdateRequest;

class AnswerController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  } 

   public function index(Question $questions){
    
    return view('answer.index', compact('answers', 'question_id'));
   }

   public function create($question_id){
    return view('answer.create', compact('question_id'));
   }

   public function store(AnswerStoreRequest $request, $question_id){
     $answers = new Answer();

     $answers->fill($request->only('image','description','iframe', 'is_correct', 'select'));
     $file = $request->get('image');

    if($file != null or $request->hasFile('image')){
        $fileNameWithTheExtension = request('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
        $extension = request('image')->getClientOriginalExtension();
        $newFileName = $fileName . '_' . time() . '.' . $extension;
        $path = request('image')->storeAs('public/images', $newFileName);
        $answers->image   = $newFileName;
      }else{
        unset($answers->image);
      }
    $answers->save();
    return redirect()->route('questions.answers.index', compact('question_id'));
   }

   public function edit($question_id, Answer $answers){
    return view('answer.edit', compact('answers', 'question_id'));
   }

   public function update($id, $question_id){
    $answers = Answer::findOrFail($id);
    $answers->description = $request->get('description');
    $answers->iframe = $request->get('iframe');
    $answers->image = $request->get('image');
    
    if($request->hasFile('image')){
      $answers->image = $request->file('image')->store('public/images');
      $answers->image = Storage::url($answers->image);
      $answers->save();
    }
    return redirect()->route('questions.answers', 'question_id');
   }

   public function confirmDelete($id){
    $answers = Answer::findOrFail($id);
    
    return view('questions.answers.confirmDelete', compact('answers', 'question_id'));
  }

  public function destroy(Answer $answers, $question_id, $id){
    $answer = Answer::findOrFail($id);
    $answer->delete();

    return redirect()->route('questions.answers.index', $question_id);
  }
}