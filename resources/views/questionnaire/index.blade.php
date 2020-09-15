@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      @if(session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
          <button type="button" class="close" data-dismiss="alert"
                  aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
    <div class="card">
      <div class="card-header">
          <a href="{{ route('questionnaires.create') }}" class="btn btn-sm btn-dark float-right">
              Crear examen.
          </a>
          <a href="{{ route('home') }}" class="btn btn-sm btn-secondary float-left">
              Regresar
          </a>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Titulo</th>
              <th>Descripcion</th>
              <th>Acciones</th>
            </tr>
          </thead>
            <tbody>
            @foreach($questionnaires as $questionnaire)
              <tr>
                <td>{{$questionnaire->title}}</td>
                <td>{{$questionnaire->description}}</td>
                <td>
                  <a href="{{ route('questions.index', $questionnaire->id) }}"
                      class="btn btn-success btn-sm" title="Agregar preguntas"><i class="fas fa-plus-square"></i>
                  </a>
                  <a href="{{ route('questionnaires.edit', $questionnaire->id) }}"
                  class="btn btn-warning btn-sm" title="Editar examen"><i class="far fa-edit"></i>
                  </a>
                  <a href="{{ route('questionnaires.confirmDelete', $questionnaire->id)}}"
                      class="btn btn-danger btn-sm" title="Eliminar examen"><i class="fas fa-trash-alt"></i>
                  </a>
                </td>
              </tr>
            @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
