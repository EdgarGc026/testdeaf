<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;

class QuestionsAnswersController extends Controller
{
    public function create(Request $request, $questionId)
    {

        $answers = new Answer();
        $answers->fill($request->only('description','iframe', 'is_correct', 'select'));
        $answers->question_id    = $questionId;

        $file = $request->get('image');

        if($file != null or $request->hasFile('image')){
            $fileNameWithTheExtension = request('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
            $extension = request('image')->getClientOriginalExtension();
            $newFileName = $fileName . '_' . time() . '.' . $extension;
            $path = request('image')->storeAs('public/answers_image', $newFileName);
            $answers->image   = $newFileName;
        }else{
            unset($answers->image);
        }
        
        
        $answers->save();

        return redirect()->route('questions.show',['question' => $questionId]);
    }
}
