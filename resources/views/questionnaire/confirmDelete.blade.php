@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Eliminar pregunta: {{$questionnaires->description}}</span>
                        <a href="{{ route('questionnaires.index') }}" class="btn btn-secondary btn-sm float-right">Regresar</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('questionnaires.destroy', $questionnaires->id) }}" method="POST">
                            @Csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿En verdad deseas eliminarlo?')">Eliminar Examen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
