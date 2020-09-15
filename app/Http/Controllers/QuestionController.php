<?php

namespace App\Http\Controllers;
use App\Answer;
use App\Question;
use App\Questionnaire;
use App\Http\Requests\QuestionStoreRequest;
use App\Http\Requests\QuestionUpdateRequest;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }
  public function index($id){
    $questionnaires = Questionnaire::findOrFail($id);
    return view('question.index', compact('questionnaires'));
  }

  public function create($id){
    $questionnaires = Questionnaire::findOrFail($id);
     return view('question.create', compact('questionnaires'));
  }

  public function store(QuestionStoreRequest $request){
    $questions = new Question;
    $questions->questionnaire_id = $request->input('questionnaire_id');
    $questions->description = $request->input('question.description');
    $questions->iframe = $request->input('question.iframe');
    $questions->image = $request->input('question.image');
    $questions->save();

    //Guardando los datos para las respuestas...
    $questions->answers()->createMany($request->answers);

    return redirect()->route('questions.index', $questions->questionnaire_id);
  }

  public function edit($id){
    $questionnaires = Question::findOrFail($id);
    return view('question.edit', compact('questionnaires'));
  }

  public function update(QuestionUpdateRequest $request){
    $questions = Question::with('questionnaire_id')->get();

  }

    /*
    $file = $request->get('image');
    if($file != null or $request->hasFile('image')){
        $fileNameWithTheExtension = request('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
        $extension = request('image')->getClientOriginalExtension();
        $newFileName = $fileName . '_' . time() . '.' . $extension;
        $path = request('image')->storeAs('public/images', $newFileName);
        $questions->image   = $newFileName;
    }else{
      unset($questions->image);
    }

      return redirect()->route('questionnaire.index', $questionnaires->id);*/




    /* $questions = new Question();
    $questions->fill($request->only('image','description','iframe'));
    $questions->questionnaire_id = auth()->user()->id;

    $file = $request->get('image');

    if($file != null or $request->hasFile('image')){
        $fileNameWithTheExtension = request('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
        $extension = request('image')->getClientOriginalExtension();
        $newFileName = $fileName . '_' . time() . '.' . $extension;
        $path = request('image')->storeAs('public/images', $newFileName);
        $questions->image   = $newFileName;
    }else{
        unset($questions->image);
    } */


 /*

  public function update(QuestionUpdateRequest $request, $id){
    $questions = Question::findOrFail($id);
    $questions->description = $request->get('description');
    $questions->iframe = $request->get('iframe');
    $questions->image = $request->get('image');

    if($request->hasFile('image')){
      $questions->image = $request->file('image')->store('public/images');
      $questions->image = Storage::url($questions->image);
      $questions->save();
    }

    return redirect()->route('questions.index');
  }

  public function destroy($id){
    $questions = Question::find($id);
    $questions->delete();

    return redirect()->route('questions.index');
  }

  public function confirmDelete($id){
    $questions = Question::find($id);
    return view('question.confirmDelete', [
        'questions' => $questions
    ]);
  }

  public function show($id){
    $questions = Question::find($id);
    return view('question.show', ['questions'=> $questions]);
  } */
}

