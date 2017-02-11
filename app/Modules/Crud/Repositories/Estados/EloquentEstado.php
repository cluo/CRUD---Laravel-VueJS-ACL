<?php 

namespace App\Modules\Crud\Repositories\Estados;

use App\Modules\Crud\Models\Estado;

class EloquentEstado implements EstadoRepository
{
	
	function __construct(Estado $estado)
	{
		$this->estado = $estado;
	}

	public function all()
	{
		return $this->estado->with('autor')->get();
	}

	public function find($id)
	{
		return $this->estado->find($id);
	}

	public function update($id, array $array)
	{
		return $this->estado->find($id)->update($array);
	}

	public function create(array $array)
	{
		return $this->estado->create($array);
	}

	public function destroy($id)
	{
		return $this->estado->find($id)->delete();
	}
}