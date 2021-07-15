<?php

    namespace App\Http\Services;

    use DB;
    use App\Dentista;
    use App\DentistaEspecialidade;

    class DentistaService {

        public function getCROUFOptionsSelect() {
            
            return [
                'AC' => 'Acre',
                'AL' => 'Alagoas',
                'AP' => 'Amapá',
                'AM' => 'Amazonas',		
                'BA' => 'Bahia',
                'CE' => 'Ceará',
                'DF' => 'Distrito Federal',		
                'ES' => 'Espírito Santo',
                'GO' => 'Goiás',
                'MA' => 'Maranhão',
                'MT' => 'Mato Grosso',
                'MS' => 'Mato Grosso do Sul',
                'MG' => 'Minas Gerais',
                'PA' => 'Pará',
                'PB' => 'Paraíba',
                'PR' => 'Paraná',
                'PE' => 'Pernambuco',
                'PI' => 'Piauí',
                'RJ' => 'Rio de Janeiro',
                'RN' => 'Rio Grande do Norte',
                'RS' => 'Rio Grande do Sul',
                'RO' => 'Rondônia',
                'RR' => 'Roraima',
                'SC' => 'Santa Catarina',
                'SP' => 'São Paulo',
                'SE' => 'Sergipe',
                'TO' => 'Tocantins'
            ];
        }

        public function store( $data ) {

            //Moves epecialidades to a new Array
            $key = array_search('especialidades', array_keys($data), true);
            $especialidades = ( $key ) 
                ? array_splice($data, $key, 1) 
                : [ 'especialidades' => [] ];
            
            //Creates Dentista
            $dentista = Dentista::create($data);

            //Creates Especialidade Links
            foreach( $especialidades['especialidades'] as $especialidade ) {
                DentistaEspecialidade::create([
                    'dentista_id' => $dentista->id,
                    'especialidade_id' => $especialidade
                ]);
            }
        }   

        public function upload( $data, $dentista ) {
                        
            //Moves especialidades to a new Array
            $key = array_search('especialidades', array_keys($data), true);
            $especialidades = ( $key ) 
                ? array_splice($data, $key, 1) 
                : [ 'especialidades' => [] ];

            //Edit Dentista
            Dentista::find($dentista)->fill($data)->save();

            //Casts data to Int
            $newEspecialidades = [];
            foreach($especialidades['especialidades'] as $especialidade) 
                $newEspecialidades[] = (int) $especialidade;

            //Get current data in the DataBase
            $currentEspecialidades = DentistaEspecialidade::where('dentista_id', '=', $dentista)
                ->pluck('especialidade_id')->toArray();            

            //Remove Especialidades
            $removeOptions = array_diff( $currentEspecialidades, $newEspecialidades );
            if( !empty( array_diff( $currentEspecialidades, $newEspecialidades ) ) ) {
                $tableName = (new DentistaEspecialidade)->getTable();
                DB::table( $tableName )
                    ->where('dentista_id', $dentista)
                    ->whereIn( 'especialidade_id', $removeOptions )
                    ->delete();
            }

            //Add Especialidades
            $addOptions = array_diff( $newEspecialidades, $currentEspecialidades );
            if( !empty( $addOptions) ) {
                foreach( $addOptions as $especialidade ) {
                    DentistaEspecialidade::create([ 
                        'dentista_id' => $dentista, 
                        'especialidade_id' => $especialidade 
                    ]);
                }
            }
        }
    }