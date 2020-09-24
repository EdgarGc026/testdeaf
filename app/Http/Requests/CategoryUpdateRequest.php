<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name' => 'required|min:3'
        ];
    }

    public function messages(){
       return [
            'name.required' => 'El :attribute es obligatorio'
       ];
    }

    public function attributes(){
        return [
            'name' => 'nombre de la categoria'
        ];
    }
}
