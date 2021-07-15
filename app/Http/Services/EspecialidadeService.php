<?php

    namespace App\Http\Services;

    use App\Especialidade;

    class EspecialidadeService {

        public function getOptionsSelect() {
            $especialidades = Especialidade::all();
            $options  = array();
            foreach($especialidades as $especialidade){
                $options[$especialidade->id] = $especialidade->nome;
            }
            return $options;
        }

    }