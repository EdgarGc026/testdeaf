@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header"> 
            <a href="{{ route('categories.index') }}" 
              class="btn btn-sm btn-secondary float-left">Regresar
            </a>
          </div>
          <div class="card-body">
            <form action="{{ route('categories.destroy', $categories->id) }}" method="POST">
              <div class="container">
                <h3 class="text-center">{{$categories->name}}</h3>
              </div>
              @CSRF
               @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('¿En verdad deseas eliminarlo?')">
                Eliminar categoria
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection