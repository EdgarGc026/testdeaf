@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      @foreach ($questionnaires as $questionnaire)
          @foreach ($questionnaire->questions as $question)
              <ul>
                <li>{{$question->id}}</li>
                <li>{{$question->description}}</li>
              </ul>
            @foreach ($question->answers as $answer)
                <ul>
                  <li>{{$answer->description}}</li>
                </ul>
            @endforeach

          @endforeach
      @endforeach
    </div>
  </div>
</div>
@endsection