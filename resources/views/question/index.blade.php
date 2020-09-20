@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-center">
          <span class="align-content-center">Modulo preguntas {{$questionnaires->title}} </span>
          <a href="{{ route('questions.create', $questionnaires->id) }}"
             class="btn btn-success btn-sm float-right" title="Agregar nueva pregunta">
            Agregar nueva pregunta
          </a>
          <a href="{{ route('questionnaires.index') }}"
             class="btn btn-secondary btn-sm float-left mr-2">
            Regresar
          </a>
        </div>
        <div class="card-body">
          <h3 class="text-center"></h3>
          <table class="table">
            <thead class="thead">
            <tr>
              <th>ID</th>
              <th>Descripcion</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($questionnaires->questions as $questions)
              <tr>
                <td>{{$questions->id}}</td>
                <td>{{$questions->description}}</td>
                <td>
                  <a href="{{ route('questions.edit', [$questionnaires, $questions->id]) }}"
                     class="btn btn-warning btn-sm" title="Editar preguntas"><i class="far fa-edit"></i>
                  </a>
                  <a href="{{ route('questions.confirmDelete', [$questionnaires, $questions->id]) }}" class="btn btn-danger btn-sm"
                     title="Eliminar preguntas"><i class="fas fa-trash-alt"></i>
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
</div>
@endsection

