@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('questions.index', $questionnaires->id) }}" class="btn btn-sm btn-secondary">Regresar</a>
        </div>
        <div class="card-body">
          <span class="text-muted">{{ $questions->id }}-.</span> {{ $questions->description }}
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-2"></div>
    <div class="col-8">
      <div class="card mt-3">
        <div class="card-body">
          @if($questions->iframe)
            <div class="embed-responsive embed-responsive-16by9">
              {!! $questions->iframe !!}
            </div>
          @endif
        </div>
      </div>
    </div>
    <div class="col-2"></div>
  </div>

  <div class="row">
    <div class="col-6">
      <div class="card mt-3">
        <div class="card-body">
          <div class="row">
            <div class="col-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" disabled>
                <label class="form-check-label" for="">Opcion 1</label>
              </div>
            </div>
            <div class="col-9">
              {{$questions->answers[0]->description}}
            </div>
          </div>
          @if ($questions->answers[0]->iframe)
            <div class="embed-responsive embed-responsive-16by9 mt-3">
              {!! $questions->answers[0]->iframe !!}
            </div>
          @endif

          @if ($questions->answers[0]->image)
              <img src="" class="card-img-top" alt="imagen de la pregunta">
          @endif
        </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card mt-3">
        <div class="card-body">
          <div class="row">
            <div class="col-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" disabled>
                <label class="form-check-label" for="">Opcion 2</label>
              </div>
            </div>
            <div class="col-9">
              {{ $questions->answers[1]->description }}
            </div>
          </div>
            @if ($questions->answers[1]->iframe)
              <div class="embed-responsive embed-responsive-16by9 mt-3">
                {!! $questions->answers[1]->iframe !!}
              </div>
            @endif

            @if ($questions->answers[1]->image)
              <img src="" class="card-img-top" alt="imagen de la pregunta">
            @endif
        </div>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-6">
      <div class="card mt-3">
        <div class="card-body">
          <div class="row">
            <div class="col-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" disabled>
                <label class="form-check-label" for="">Opcion 3</label>
              </div>
            </div>
            <div class="col-9">
              {{$questions->answers[2]->description}}
            </div>
          </div>
          @if ($questions->answers[2]->iframe)
            <div class="embed-responsive embed-responsive-16by9 mt-3">
              {!! $questions->answers[2]->iframe !!}
            </div>
          @endif

          @if ($questions->answers[2]->image)
              <img src="" class="card-img-top" alt="imagen de la pregunta">
          @endif
        </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card mt-3">
        <div class="card-body">
          <div class="row">
            <div class="col-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" disabled>
                <label class="form-check-label" for="">Opcion 4</label>
              </div>
            </div>
            <div class="col-9">
              {{$questions->answers[3]->description}}
            </div>
          </div>

          @if ($questions->answers[3]->iframe)
            <div class="embed-responsive embed-responsive-16by9 mt-3">
              {!! $questions->answers[3]->iframe !!}
            </div>
          @endif

          @if ($questions->answers[3]->image)
              <img src="" class="card-img-top" alt="imagen de la pregunta">
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
