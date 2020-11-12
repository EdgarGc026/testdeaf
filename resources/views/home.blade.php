@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
          @endif

            <div class="container text-center">
            <h3>¡Bienvenido de nuevo {{$user->name}}!</h3>
              <br />
            <h4 class="text-left mb-2">¿Que deseas hacer?</h4>
              <br />
              <div class="row">
                @if(auth()->user()->role == 'student')
                <div class="col-4">
                  <a class="btn btn-dark btn-sm mr-1 "
                     href="{{ route('survey.index') }}" title="Tomar el examen">Tomar el examen</a>
                </div>
                @endif
                <div class="col-4">

                </div>
                @if(auth()->user()->role == 'admin')
                <div class="col-4">
                  <a class="btn btn-dark btn-sm "
                     href="{{ route('questionnaires.index') }}" title="Crear examen">Mostrar examen</a>
                </div>
                @endif
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
