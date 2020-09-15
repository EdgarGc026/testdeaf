<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamUpdateRequest extends FormRequest{
    
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'description' => 'required|min:3',
            'iframe' => 'required|min:0|max:100',
            'image' => 'image|max:5000',
            'is_correct' => 'required',
            'select' => 'required'
        ];
    }

    public function messages(){
        return[
            // 
        ];
    }
}
