<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EspecialidadeEditRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules() {
        return [
            'nome' => 'required'
        ];
    }

    public function messages() {
        return [
            'nome.required' => 'O campo Nome é obrigatório'
        ];
    }
}
