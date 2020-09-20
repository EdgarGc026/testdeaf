@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">

      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <div class="card">
        <div class="card-header">
          <a class="btn btn-secondary btn-sm float-left mr-2" href="{{ route('questionnaires.index') }}">
            Regresar
          </a>
        </div>
        <div class="card-body">
          <h3 class="text-center">Creando examen</h3>
          <form action="{{ route('questionnaires.store') }}" method="post">
            @csrf
            <input hidden name="user_id" value="{{ auth()->user()->id }}">
            <div class="form-group">
              <label for="title">Titulo</label>
              <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp"
                placeholder="Ingresa el titulo">
            </div>

            <div class="form-group">
              <label for="description">Descripcion</label>
              <textarea class="form-control" name="description" id="description" type="text"
                aria-describedby="descriptionHelp" placeholder="Agrega una descripcion"></textarea>
              <small id="purposeHelp" class="form-text text-muted">Agrega una descripcion al examen.</small>
            </div>
            <button type="submit" class="btn btn-primary">Crear el examen</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
