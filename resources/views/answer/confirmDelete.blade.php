@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-12">
        <div class="card">
          <div class="card-header">
            <span>Eliminar respuesta:{{$answers->description}} </span>
            <a href="{{ route('questions.index', [$exams->id, $questions->id, $answers->id]) }}"
               class="btn btn-secondary btn-sm float-right">Regresar</a>
          </div>
          <div class="card-body">
            <form action="{{ route('questions.destroy', [$exams->id, $questions->id, $answers->id]) }}" method="POST">

              @Csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger"
                      onclick="return confirm('¿En verdad deseas eliminarlo?')"
              >Eliminar pregunta
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
