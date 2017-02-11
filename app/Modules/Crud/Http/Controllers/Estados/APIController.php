<?php

namespace App\Modules\Crud\Http\Controllers\Estados;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\Crud\Repositories\Estados\EloquentEstado;
use Auth;
use App\User;
use Validator;

use Response;

class APIController extends Controller
{
	public function __construct(EloquentEstado $estado)
    {
    	$this->estado = $estado;
    }

    public function index()
    {
    	return response()->json([
    		'estados' => $this->estado->all()
    	]);
    }

    public function show($id)
    {
    	return response()->json([
    		'estado' => $this->estado->find($id)
    	]);
    }

}
