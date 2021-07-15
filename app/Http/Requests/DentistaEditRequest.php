<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DentistaEditRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules() {
        return [
            'nome' => 'required|max:100',
            'email' => 'required|email|max:100',
            'cro' => 'required',
            'cro_uf' => 'required|max:2',
            // 'fornecedor_id' => 'required|exists:fornecedores,id'
        ];
    }

    public function messages() {
        return [
            'nome.required' => 'O campo Nome é obrigatório',
            'nome.max' => 'O campo Nome não pode conter mais de 100 caracteres',
            'email.required' => 'O campo Email é obrigatório',
            'email.email' => 'Insira um Email válido',
            'email.max' => 'O campo E-mail não pode conter mais de 100 caracteres',
            'cro.required' => 'O campo CRO é obrigatório',
            'cro_uf.required' => 'O campo CRO UF é obrigatório',
            'cro_uf.max' => 'O campo CRO UF não pode conter mais de 2 caracteres'
        ];
    }
}
