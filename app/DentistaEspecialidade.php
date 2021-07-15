<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DentistaEspecialidade extends Model
{
    protected $table = 'dentistas_especialidades';
    protected $fillable = [ 'dentista_id', 'especialidade_id' ];

}
