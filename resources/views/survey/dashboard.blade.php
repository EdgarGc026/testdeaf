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
            <h5 class="text-center">Tus examenes disponibles</h5>
            <ul class="list-group">
              @foreach($questionnaireNotApplies as $questionnaireNotApply)
                <li class="list-group-item">
                  <a href="#" title="Examen a contestar">{{ $questionnaireNotApply->title }}</a>
                </li>
              @endforeach
            </ul>
          </div>
      </div>

    </div>
  </div>
@endsection
