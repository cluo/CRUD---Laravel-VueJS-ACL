<?php

namespace App\Modules\Crud\Http\Controllers\Estados;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Crud\Repositories\Estados\EloquentEstado;

class EstadoController extends Controller
{
    public function __construct(EloquentEstado $estado)
    {
        $this->middleware('auth');
    	$this->estado = $estado;
    }

    public function index()
    {
    	return view('crud::index');
    }

    public function get()
    {
    	# code...
    }
}
