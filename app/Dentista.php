<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Especialidade;
use App\DentistaEspecialidade;

class Dentista extends Model
{
    protected $fillable = [ 'nome', 'email', 'cro', 'cro_uf' ];

    public function especialidade() {
        $tableName = (new DentistaEspecialidade)->getTable();
        $entidades = 
            $this
                ->belongsToMany(Especialidade::class, $tableName)
                ->get(['nome']);
        $ret = "";
        foreach ($entidades as $entidade) $ret .= $entidade->nome.', ';
        return substr($ret, 0, -2);
    }

    public function dentistaEspecialidade() {
        return $this->hasMany(DentistaEspecialidade::class);
    }

}
