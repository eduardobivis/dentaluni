<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Especialidade;

class Dentista extends Model
{
    protected $fillable = [ 'nome', 'email', 'cro', 'cro_uf' ];

    // public function especialidades(){
    //     return $this->hasMany(Especialidade::class);
    // }

}
