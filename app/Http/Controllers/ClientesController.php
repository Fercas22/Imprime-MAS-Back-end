<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Support\Facades\Hash;


class ClientesController extends Controller
{

    public function clientes(Request $request){
        if($request->estatus){
            $clientes = Clientes::onlyTrashed()->get();
            return response()->json([
                'status' => true,
                'message' => $request->estatus,
                'data' => ['clientes'=>$clientes]
            ],200);
        }
        $clientes = Clientes::all();
        return response()->json([
            'status' => true,
            'message' => 'Listado',
            'data' => ['clientes'=>$clientes]
        ],200);
    }

    public function cliente($id_cliente){
        $cliente = Clientes::find($id_cliente);
        if (!$cliente) {
            return response()->json([
                'status' => false,
                'message' => 'Cliente no encontrado'
            ],400);
        }
        return response()->json([
            'status' => true,
            'data' => ['cliente'=>$cliente]
        ],200);
    }

    public function create(Request $request){
        $rules = [
            'sobrenombre' => 'required|string',
            'nombre' => 'required|string',
            'rfc' => 'required|string',
            'correo' => 'required|string',
            'celular' => 'required|string',
            'celular2' => 'required|string',
            'cp' => 'required|string',
            'direccion' => 'required|string',
            'numExterior' => 'required|string|max:5',
            'numInterior' => 'required|string|max:5',
            'colonia' => 'required|string',
            'ciudad' => 'required|string',
            'estado' => 'required|string',
            'situacionFiscal' => 'required|string',
            'cfdi' => 'required|string',
            'metodoPago' => 'required|string',
            'mayoristaMenudista' => 'required',
        ];
        $validator = \Validator::make($request->input(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ],400);
        }
        $cliente = Clientes::create([
            'sobrenombre' => $request->sobrenombre,
            'nombre' => $request->nombre,
            'rfc' => $request->rfc,
            'correo' => $request->correo,
            'celular' => $request->celular,
            'celular2' => $request->celular2,
            'cp' => $request->cp,
            'direccion' => $request->direccion,
            'numExterior' => $request->numExterior,
            'numInterior' => $request->numInterior,
            'colonia' => $request->colonia,
            'ciudad' => $request->ciudad,
            'estado' => $request->estado,
            'situacionFiscal' => $request->situacionFiscal,
            'cfdi' => $request->cfdi,
            'metodoPago' => $request->metodoPago,
            'mayoristaMenudista' => $request->mayoristaMenudista,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cliente creado satisfactoriamente',
        ],200);

    }

    public function update(Request $request){

        $cliente = Clientes::find($request->id_cliente);

        if (!$cliente) {
            return response()->json([
                'status' => false,
                'message' => 'Cliente no encontrado'
            ],400);
        }

        $rules = [
            'sobrenombre' => 'required|string',
            'nombre' => 'required|string',
            'rfc' => 'required|string',
            'correo' => 'required|string',
            'celular' => 'required|string',
            'celular2' => 'required|string',
            'cp' => 'required|string',
            'direccion' => 'required|string',
            'numExterior' => 'required|string|max:5',
            'numInterior' => 'required|string|max:5',
            'colonia' => 'required|string',
            'ciudad' => 'required|string',
            'estado' => 'required|string',
            'situacionFiscal' => 'required|string',
            'cfdi' => 'required|string',
            'metodoPago' => 'required|string',
            'mayoristaMenudista' => 'required',
        ];
        $validator = \Validator::make($request->input(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ],400);
        }
        $cliente->update([
            'sobrenombre' => $request->sobrenombre,
            'nombre' => $request->nombre,
            'rfc' => $request->rfc,
            'correo' => $request->correo,
            'celular' => $request->celular,
            'celular2' => $request->celular2,
            'cp' => $request->cp,
            'direccion' => $request->direccion,
            'numExterior' => $request->numExterior,
            'numInterior' => $request->numInterior,
            'colonia' => $request->colonia,
            'ciudad' => $request->ciudad,
            'estado' => $request->estado,
            'situacionFiscal' => $request->situacionFiscal,
            'cfdi' => $request->cfdi,
            'metodoPago' => $request->metodoPago,
            'mayoristaMenudista' => $request->mayoristaMenudista,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Datos del cliente actualizado satisfactoriamente',
        ],200);

    }

    public function delete(Request $request){
        $cliente = Clientes::find($request->id_cliente);
        if (!$cliente) {
            return response()->json([
                'status' => false,
                'message' => 'Cliente no encontrado'
            ],400);
        }
        Clientes::find($request->id_cliente)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Cliente eliminado satisfactoriamente',
            'data' => $cliente
        ],200);

    }

}
