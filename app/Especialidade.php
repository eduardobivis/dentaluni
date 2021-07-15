<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DentistaEspecialidade;

class Especialidade extends Model
{
    protected $fillable = [ 'nome' ];

    public function dentistaEspecialidade() {
        return $this->hasMany(DentistaEspecialidade::class);
    }
}
