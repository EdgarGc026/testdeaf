<?php

namespace App\Http\Controllers;

use App\Question;
use App\Http\Requests\QuestionStoreRequest;
use App\Http\Requests\QuestionUpdateRequest;

class ExamController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $exams = Exam::all()->where('user_id', auth()->user()->id);
    return view('exam.index', compact('exams'));
  }

  public function create(){
    return view('exam.create');
  }

  public function store(ExamStoreRequest $request){
    $ques = Exam::create([
        'user_id' => auth()->user()->id
    ] + $request->all());

    return redirect()->route('exams.index');
  }

  public function edit($id){
    $exams = Exam::find($id);
    return view('exam.edit', compact('exams'));
  }

  public function update(QuestionUpdateRequest $request, $id){
    $exams = Exam::find($id);
    $exams->update($request->all());

    $exams->save();
    return redirect()->route('exams.index');
  }

  public function destroy($id){
    $exams = Exam::find($id);
    $exams->delete();

    return redirect()->route('exams.index');
  }

  public function confirmDelete($id){
    $exams = Exam::find($id);
    return view('exam.confirmDelete', [
        'exams' => $exams
    ]);
  }
}
