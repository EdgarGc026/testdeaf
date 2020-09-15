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
            <a href="{{ route('questionnaires.index') }}" class="btn btn-secondary btn-sm float-left">
              Regresar
            </a>
          </div>
          <div class="card-body">
            <h3 class="text-center">Editando examen</h3>
            <form action="{{ route('questionnaires.update', $questionnaires->id) }}" method="post">
              <input hidden name="user_id" value="{{ auth()->user()->id }}">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input name="title" type="text" class="form-control"
                          id="title" aria-describedby="titleHelp"
                          placeholder="Ingresa el titulo" value="{{ old('title', $questionnaires->title) }}">
                </div>
                <div class="form-group">
                  <label for="description">Descripcion</label>
                  <textarea class="form-control" name="description" id="description"
                            type="text" aria-describedby="descriptionHelp"
                            placeholder="Agrega una descripcion"
                  >{{ old('description', $questionnaires->description) }}</textarea>
                  <small id="purposeHelp" class="form-text text-muted">
                    Giving a purpose will increase responses.
                  </small>
                </div>
                  @csrf
                  @method('PUT')
                  <button type="submit" class="btn btn-primary">Create examen</button>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
