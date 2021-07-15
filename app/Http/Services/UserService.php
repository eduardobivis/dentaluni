<?php

    namespace App\Http\Services;

    use App\User;

    class UserService {

        public function store($request){

            //Valida Request e Monta Array de Dados
            $dados = $request->all();
            User::create($dados);
            
        }

        public function update($request, $id){

            //Valida Request e Monta Array de Dados
            $dados = $request->all();
            $user = User::find($id);            
            $user->fill($dados)->save();

        }
    }