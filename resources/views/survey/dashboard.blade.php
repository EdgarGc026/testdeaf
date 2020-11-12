@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-secondary btn-sm float-left mr-2"
               href="{{ route('home') }}">
              Regresar
            </a>

        </div>
          <div class="card-body">
            <h5 class="text-center">Tus examenes disponibles, clic en el nombre para ir a el</h5>
            <ul class="list-group">
              @foreach($questionnaireNotApplies as $questionnaireNotApply)
                <li class="list-group-item">
                  {{ $questionnaireNotApply->title }}
                  <a href="{{ route('survey.show', $questionnaireNotApply->id) }}"
                     class="btn btn-outline-primary float-right"
                     title="Examen a contestar"
                  >Presentar examen</a>

                </li>
              @endforeach
            </ul>
          </div>
      </div>

    </div>
  </div>
@endsection
