@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="card mb-4">
          <div class="card-header text-center">
              <span class="text-muted">Respuestas de la pregunta</span>
              <a href="{{ route('questions.answers.create', $question_id) }}"
                 class="btn btn-success btn-sm float-right"
                 title="Agregar nueva pregunta">
                  Agregar nueva respuesta
              </a>
              {{-- <a href="{{ route('exams.questions.index', [$question_id]) }}"
                 class="btn btn-secondary btn-sm float-left mr-2">
                  Regresar
              </a> --}}
          </div>
          <div class="card-body">
              <table class="table">
                  <thead class="thead" >
                      <tr>
                          <th>ID</th>
                          <th>Descripcion</th>
                          <th>Acciones</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($answers as $answer)
                      <tr>
                          <td>{{ $answer->id }}</td>
                          <td>{{ $answer->description }}</td>
                          <td>
                              {{-- <a href="{{ route('answers.edit', [$exams->id, $questions->id, $answer->id]) }}"
                                 class="btn btn-warning btn-sm"><i class="far fa-edit"></i>
                              </a>
                              <a href="{{ route('answers.confirmDelete', [$exams->id, $questions->id, $answer->id]) }}"
                                 class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>
                              </a> --}}
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  @endsection
