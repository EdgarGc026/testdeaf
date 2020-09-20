@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col col-md-12">
      <div class="card">
        <div class="card-header">
          <span>Eliminar pregunta: {{$questions->id}} </span>
          <a href="{{ route('questions.index', $questionnaires->id) }}" class="btn btn-secondary btn-sm float-right">Regresar</a>
        </div>
        <div class="card-body">
          <form action="{{ route('questions.destroy', [$questionnaires->id, $questions->id]) }}" method="POST">
            @Csrf
            <div class="container">
              <h3>Apunto de eliminarla</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>description</th>
                      <th>iframe</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{ $questions->id }}</td>
                      <td>{{ $questions->description }}</td>
                      <td>{{ $questions->iframe }}</td>
                    </tr>
                  </tbody>
                </table>
            </div>
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿En verdad deseas eliminarlo?')">Eliminar pregunta</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
