<?php

use Illuminate\Database\Seeder;
use App\Modules\Crud\Repositories\Estados\EloquentEstado;

class TableEstados extends Seeder
{

	public function __construct(EloquentEstado $estado)
	{
		$this->estado = $estado;
	}

    public function run()
    {

    	$estados = array(
    		[
    			'estado_nome' => 'Amazonas',
    			'estado_sigla' => 'AM',
    			'estado_historico' => 'Historico',
    			'estado_autor' => 1
    		]
    	);

    	foreach($estados as $key){
        	$this->estado->create($key);
    	}

    }
}
