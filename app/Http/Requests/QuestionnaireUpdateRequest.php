<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionnaireUpdateRequest extends FormRequest{
    public function authorize(){
        return true;
    }

  public function rules(){
    return [
      'title' => 'required|min:3',
      'description' => 'required|min:3',
    ];
  }

  public  function messages(){
    return [
      'title.required' => 'El :attribute es obligatorio',
      'title.min' => 'El :attribute debe tener minimo 3 caracteres',
      'description.required' => 'La :attribute es obligatoria',
      'description.min' => 'La :attribute debe tener minimo 3 caracteres'
    ];
  }

  public function attributes(){
    return [
      'title' => 'titulo del examen',
      'description' => 'descripcion del examen'
    ];
  }
}
