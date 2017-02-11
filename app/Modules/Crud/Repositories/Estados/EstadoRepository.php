<?php 

namespace App\Modules\Crud\Repositories\Estados;

interface EstadoRepository {

	public function all();

	public function create(array $array);

}