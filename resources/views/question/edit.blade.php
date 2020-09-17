@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('questions.index', $questionnaires->id) }}"
             class="btn btn-secondary btn-sm float-left mr-2"
             title="Regresar">
            Regresar
          </a>
        </div>
        <div class="card-body">

          @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                  <li> {{$error}}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('questions.update', [$questionnaires, $questionnaires->questions->id]) }}" method="POST" enctype="multipart/form-data">
            @CSRF
            <h2 class="text-center">Editando la pregunta: <span>{{$questionnaires->id}}</span></h2>
            <legend>Pregunta</legend>
            <input hidden name="questionnaire_id" value="{{ $questionnaires->id }}">
            <div class="form-group">
              <label for="description">Descripcion de la pregunta*</label>
              <textarea name="question[description]" type="text"
                        class="form-control" id="description"
                        aria-describedby="descriptionHelp"
                        placeholder="Inserte la pregunta">{{ old('question.description') }}</textarea>
              <small id="descriptionHelp" class="form-text text-muted">
                Escribe la descripcion de la pregunta.
              </small>
            </div>
            <div class="form-group">
              <label for="iframe">Video asociado *</label>
              <textarea name="question[iframe]" type="text"
                        class="form-control" id="iframe"
                        aria-describedby="iframeHelp"
                        placeholder="Inserte la URL del video">{{ old('question.iframe')}}</textarea>
              <small id="iframeHelp" class="form-text text-muted">
                Inserta la url del video.
              </small>
            </div>

            <div class="form-group d-flex flex-column">
              <label for="image">Imagen asociada</label>
              <input name="question[image]" type="file" accept="image/*" class="py-1">
            </div>
            <hr /><br />
        </div>
      </div>

      <div class="card mt-4">
        <div class="card-body">
          <legend>Respuesta #1</legend>
          <div class="form-group">
            <label for="descriptionHelp">Descripcion</label>
            <textarea name="answers[0][description]" type="text"
                      class="form-control" id="description"
                      aria-describedby="descriptionHelp"
                      placeholder="Inserte la respuesta">{{ old('answers.0.description') }}</textarea>
            <small id="descriptionHelp" class="form-text text-muted">
              Escribe la descripcion de la respuesta.
            </small>
          </div>

          <div class="form-group">
            <label for="iframeHelp">Link del Video</label>
            <textarea name="answers[0][iframe]" type="text"
                      class="form-control" id="iframe"
                      aria-describedby="iframeHelp"
                      placeholder="Inserte el video">{{ old('answers.0.iframe') }}</textarea>
            <small id="descriptionHelp" class="form-text text-muted">
              Escribe la descripcion de la pregunta.
            </small>
          </div>

          <div class="form-group d-flex flex-column">
            <label for="image">Imagen asociada</label>
            <input name="answers[0][image]" type="file" class="py-1">
          </div>

          <div class="form-group">
            <label>Opciones</label>
            <select name="answers[0][is_correct]" id="is_correct" class="form-control">
              <option value="" disabled>Selecciona la opcion</option>
              <option value="1">Correcta</option>
              <option value="0">Incorrecta</option>
            </select>
          </div>
        </div>
      </div>

      <div class="card mt-4">
        <div class="card-body">
          <legend>Respuesta #2</legend>
          <div class="form-group">
            <label for="descriptionHelp">Descripcion</label>
            <textarea name="answers[1][description]" type="text"
                      class="form-control" id="description"
                      aria-describedby="descriptionHelp"
                      placeholder="Inserte la respuesta">{{ old('answers.1.description') }}</textarea>
            <small id="descriptionHelp" class="form-text text-muted">
              Escribe la descripcion de la respuesta.
            </small>
          </div>

          <div class="form-group">
            <label for="iframeHelp">Link del Video</label>
            <textarea name="answers[1][iframe]" type="text"
                      class="form-control" id="iframe"
                      aria-describedby="iframeHelp"
                      placeholder="Inserte el video">{{ old('answers.1.iframe') }}</textarea>
            <small id="descriptionHelp" class="form-text text-muted">
              Escribe la descripcion de la pregunta.
            </small>
          </div>

          <div class="form-group d-flex flex-column">
            <label for="image">Imagen asociada</label>
            <input name="answers[1][image]" type="file" class="py-1">
          </div>

          <div class="form-group">
            <label>Opciones</label>
            <select name="answers[1][is_correct]" id="is_correct" class="form-control">
              <option value="" disabled>Selecciona la opcion</option>
              <option value="1">Correcta</option>
              <option value="0">Incorrecta</option>
            </select>
          </div>
        </div>
      </div>

      <div class="card mt-4">
        <div class="card-body">
          <legend>Respuesta #3</legend>
          <div class="form-group">
            <label for="descriptionHelp">Descripcion</label>
            <textarea name="answers[2][description]" type="text"
                      class="form-control" id="description"
                      aria-describedby="descriptionHelp"
                      placeholder="Inserte la respuesta">{{ old('answers.2.description') }}</textarea>
            <small id="descriptionHelp" class="form-text text-muted">
              Escribe la descripcion de la respuesta.
            </small>
          </div>

          <div class="form-group">
            <label for="iframeHelp">Link del Video</label>
            <textarea name="answers[2][iframe]" type="text"
                      class="form-control" id="iframe"
                      aria-describedby="iframeHelp"
                      placeholder="Inserte el video">{{ old('answers.2.iframe') }}</textarea>
            <small id="descriptionHelp" class="form-text text-muted">
              Escribe la descripcion de la pregunta.
            </small>
          </div>

          <div class="form-group d-flex flex-column">
            <label for="image">Imagen asociada</label>
            <input name="answers[2][image]" type="file" class="py-1">
          </div>

          <div class="form-group">
            <label>Opciones</label>
            <select name="answers[2][is_correct]" id="is_correct" class="form-control">
              <option value="" disabled>Selecciona la opcion</option>
              <option value="1">Correcta</option>
              <option value="0">Incorrecta</option>
            </select>
          </div>
        </div>
      </div>

      <div class="card mt-4">
        <div class="card-body">
          <legend>Respuesta #4</legend>
          <div class="form-group">
            <label for="descriptionHelp">Descripcion</label>
            <textarea name="answers[3][description]" type="text"
                      class="form-control" id="description"
                      aria-describedby="descriptionHelp"
                      placeholder="Inserte la respuesta"
            >{{ old('answers.3.description') }}</textarea>
            <small id="descriptionHelp" class="form-text text-muted">
              Escribe la descripcion de la respuesta.
            </small>
          </div>

          <div class="form-group">
            <label for="iframeHelp">Link del Video</label>
            <textarea name="answers[3][iframe]" type="text"
                      class="form-control" id="iframe"
                      aria-describedby="iframeHelp"
                      placeholder="Inserte el video">{{ old('answers.3.iframe') }}</textarea>
            <small id="descriptionHelp" class="form-text text-muted">
              Escribe la descripcion de la pregunta.
            </small>
          </div>

          <div class="form-group d-flex flex-column">
            <label for="image">Imagen asociada</label>
            <input name="answers[3][image]" type="file" class="py-1">
          </div>

          <div class="form-group">
            <label>Opciones</label>
            <select name="answers[3][is_correct]" id="is_correct" class="form-control">
              <option value="" disabled>Selecciona la opcion</option>
              <option value="1">Correcta</option>
              <option value="0">Incorrecta</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Guardar pregunta</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
