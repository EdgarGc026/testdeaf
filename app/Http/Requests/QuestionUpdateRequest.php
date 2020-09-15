<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest{
    public function authorize(){
        return true;
    }

  public function rules(){
    return [
      'question.description'      => 'required|min:3',
      'question.iframe'           => 'required',
      'question.image'            => 'image|max:5000|mimes:jpg,jpeg,png',

      'answers.*.description'     => 'required|min:3',
      'answers.*.iframe'          => 'required',
      'answers.*.image'           => 'image|max:5000|mimes:jpg,jpeg,png',
      'answers.*.is_correct'      => 'required'
    ];
  }

  public function attributes(){
    return [
      'question.description'    => 'campo descripcion',
      'question.iframe'         => 'campo video',
      'question.image'          => 'campo imagen',

      'answers.*.description'   => 'campo descripcion',
      'answers.*.iframe'        => 'campo video',
      'answers.*.image'         => 'campo imagen',
      'answers.*.is_correct'    => 'campo respuesta'
    ];
  }

  public function messages(){
    return[
      'question.description.required'   => 'El :attribute de la pregunta es obligatorio',
      'question.description.min'        => 'El :attribute de la pregunta debe tener minimo 3 caracteres',
      'question.iframe.required'        => 'El :attribute de la pregunta es obligatorio',
      'question.image.image'            => 'El :attribute de la pregunta debe ser una imagen',
      'question.image.max'              => 'El :attribute de la pregunta debe pesar maximo 5 megabytes',
      'question.image.mimes'            => 'El :attribute de la pregunta solo acepta los formatos JPG y PNG',

      'answers.*.description.required'   => 'El :attribute de la respuesta es obligatorio',
      'answers.*.description.min'        => 'El :attribute de la respuesta debe tener minimo 3 caracteres',
      'answers.*.iframe.required'        => 'El :attribute de la respuesta es obligatorio',
      'answers.*.image.image'            => 'El :attribute de la respuesta debe ser una imagen',
      'answers.*.image.max'              => 'El :attribute de la respuesta debe pesar maximo 5 megabytes',
      'answers.*.image.mimes'            => 'El :attribute de la respuesta solo acepta los formatos JPG y PNG',
      'answers.*.is_correct.required'    => 'El :attribute de la respuesta solo es obligatorio'
    ];
  }
}
