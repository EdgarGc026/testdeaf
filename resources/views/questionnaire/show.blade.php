@extends('layouts.app')
@section('content')
<div class="container">
  @foreach ($questionnaires as $questionnaire)
    @foreach ($questionnaire->questions as $question)
      @if($question->id and $question->description)
        <div class="card pt-1">
          <div class="card-body text-justify">{{$question->id}}.- {{$question->description}}</div>
        </div>
      @endif
      @if ($question->iframe)
          <div class="row">
            <div class="col">
              <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                  <div class="card mt-1">
                    <div class="card-body">
                      <div class="embed embed-responsive embed-responsive-16by9 mt-3">
                        {{!! $question->iframe !!}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      @endif

      <div class="row mt-2">
        <div class="col-12">
          <div class="row">
            @foreach ($question->answers as $answer)
              <div class="col-6">
                <div class="card mb-2">
                  <div class="card-body">
                    <div class="row justify-content-center align-items-center">
                      @if ($answer->iframe)
                        <div class="col-3">
                          <div class="form-check form-check form-check-inline  ml-1">
                            <input class="form-check" id="OpcionD" name="Opcion" value="" type="radio">
                            <label class="form-check-label ml-1" for="Opcion">Respuestas</label>
                          </div>  
                        </div>
                        <div class="col-9">
                          {{$answer->description}}
                        </div>
                        <div class="embed-responsive embed-responsive-16by9 mt-3">
                          {{!! $answer->iframe !!}}
                        </div>
                      @endif
                    </div>
                  </div>
                </div>  
              </div>  
            @endforeach
          </div>
        </div>
      </div>
    @endforeach
  @endforeach
  
</div>
@endsection