@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('categories.index') }}" 
              class="btn btn-sm btn-secondary">Regresar
            </a>
          </div>
          <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
              <div class="form-group">
                <label for="name">Titulo</label>
                <input name="name" type="text" class="form-control" id="name"
                  aria-describedby="nameHelp" placeholder="Ingresa el nobre de la categoria">
              </div>
              @CSRF
              <button type="submit" class="btn btn-primary">Crear la categoria</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection