@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Mi pregunta</h2>
                </div>
                <div class="card-body">
                    <p><b>Pregunta:</b> {{ $questions->description }}</p>
                    <p><b>Foto:</b> <img class="img-circle img-bordered-sm" src="{{ asset('storage/images/'.$questions->image) }}" alt="user image" width="200px"></p>
                    <p><b>Video:</b> {{ $questions->iframe }}</p>
                    <br><br><br>
                <h4>Agregar Respuesta</h4>    

                <div class="row">
                    <div class="col-md-12">
                        @if(Auth::guest())
                            Inicia sesión por favor!
                        @else
                        <form action="{{ route('create_answer',['questions' => $questions->id ]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Descripción:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="description" placeholder="Agregar descripción">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Video:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="iframe" placeholder="Agregar Url">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Imagen:</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">is_correct:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="is_correct" placeholder="Asigna un valor">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">select:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="select" placeholder="Asigna un valor">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Agregar Respuesta</button>
                                <a class="btn btn-warning" href="">Regresar</a>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>

                <h3>Respuesta</h3>
                <div class="row">
                    <div class="col-md-12">
                        @foreach($questions->answers as $answer)
                        <div class="row">
                            <div class="col-md-12">
                            <p><b>Respuesta: </b>  {{ $answer->description }} </p>
                            <p><b>Video: </b> {{ $answer->iframe }} </p>
                            <img class="img-circle img-bordered-sm" src="{{ asset('storage/answers_image/'.$answer->image) }}" alt="user image" width="200px">
                            <p><b>is_correct: </b>  {{ $answer->is_correct }} </p>
                            <p><b>select: </b> {{ $answer->select }} </p>
                            </div>
                        </div>
                        <hr>
                        @endforeach    
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection