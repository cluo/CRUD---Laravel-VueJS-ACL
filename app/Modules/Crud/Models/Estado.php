<?php

namespace App\Modules\Crud\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "estados";

    protected $fillable = [
    	'estado_nome',
    	'estado_sigla',
    	'estado_historico',
    	'estado_autor'
    ];

    protected $hidden = [
    	'estado_autor'
    ];

    public function autor()
    {
    	return $this->hasOne('App\User', 'id', 'estado_autor');
    }
}
