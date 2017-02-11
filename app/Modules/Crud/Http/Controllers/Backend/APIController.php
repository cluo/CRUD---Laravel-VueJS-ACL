<?php

namespace App\Modules\Crud\Http\Controllers\Backend;

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
        $this->middleware('auth');
        $this->estado = $estado;
    }

    public function create(Request $request)
    {
        if(Auth::user()->ability('admin', 'criar')){
            $regras = [
                'estado_nome' => 'required',
                'estado_sigla' => 'required',
                'estado_historico' => 'required',
            ];

            $mensagens = [
                'estado_nome.required' => 'O nome do estado é obrigatório!',
                'estado_sigla.required' => 'O nome do estado é obrigatório!',
                'estado_historico.required' => 'O nome do estado é obrigatório!',
            ];

            $validator = Validator::make($request->all(), $regras, $mensagens);

            if($validator->fails()){
                return response()->json([
                    'errors' => $validator->errors()
                ]);

            } else {

                $criar = [
                    'estado_autor' => Auth::user()->id
                ];

                $var = array_merge($request->all(), $criar);

                return response()->json([
                    'estado' => $this->estado->create($var)
                ], 200);

            }
        } else {
            return response()->json([
                'permissao' => 'Você não tem permissão!'
            ]);
        }
    }

    public function patch($id, Request $request)
    {
        if(Auth::user()->ability('admin', 'atualizar')){
            $regras = [
                'estado_nome' => 'required',
                'estado_sigla' => 'required',
                'estado_historico' => 'required',
                'estado_autor' => 'required'
            ];

            $mensagens = [
                'estado_nome.required' => 'O nome do estado é obrigatório!',
                'estado_sigla.required' => 'O nome do estado é obrigatório!',
                'estado_historico.required' => 'O nome do estado é obrigatório!',
                'estado_autor.required' => 'O nome do estado é obrigatório!',
            ];

            $validator = Validator::make($request->all(), $regras, $mensagens);

            if($validator->fails()){

                return response()->json([
                    'errors' => $validator->errors()
                ]);


            } else {

                $estado = $this->estado->update($id, $request->all());

                return response()->json([
                    'mensagem' => 'Atualizado com sucesso!'
                ]);
            }
        } else {
            return response()->json([
                'permissao' => 'Você não tem permissão!'
            ]);
        }
    }

    public function destroy(Request $request, $id)
    {        
        if(Auth::user()->ability('admin', 'apagar')){

        	$estado = $this->estado->destroy($id);

        	return response()->json([
        		'mensagem' => 'Deletado com sucesso!'
        	]);
        } else {
            return response()->json([
                'permissao' => 'Você não tem permissão!'
            ]);
        }
    }
}
