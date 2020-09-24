@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card">
            <div class="card-header"> Categoria para las preguntas
              <a href="{{ route('categories.create') }}" 
                class="btn btn-sm btn-success float-right">Crear nueva categoria</a>
            </div>
            <div class="card-body">
              <table class="table">
                <thead class="thead">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" 
                          class="btn btn-warning btn-sm"><i class="far fa-edit"></i>
                        </a>
                        <a href="{{ route('categories.confirmDelete', $category->id) }}" 
                          class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>
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