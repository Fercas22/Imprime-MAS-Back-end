<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function get(Request $request){
        if($request->estatus){
            $usuarios = User::onlyTrashed()->exclude(['token','id_rol'])->get();
            return response()->json([
                'status' => true,
                'message'=>$request->all(),
                'data' => ['usuarios'=>$usuarios]
            ],200);
        }
        $usuarios = User::exclude(['token','id_rol'])->get();

        return response()->json([
            'status' => true,
            'message'=>'Listado',
            'data' => ['usuarios'=>$usuarios]
        ],200);
    }

    public function getUser($id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Usuario no encontrado'
                ],
                400
            );
        }
        return response()->json([
            'status' => true,
            'data' => ['usuarios'=>$usuario]
        ],200);
    }

    public function create(Request $request)
    {
        $rules = [
            'nombre' => 'required|string|max:100',
            'nick_name' => 'string|max:100',//Opcional
            'email' => 'required|string|max:100|unique:users',
            'password' => 'required|string|min:8',
            'telefono' => 'required|string|min:10|max:10',
            'telefono_emergencia' => 'string|min:10|max:10',//Opcional
        ];
        $validator = \Validator::make($request->input(), $rules);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'errors' => $validator->errors()->all()
                ],
                400
            );
        }

        $user = User::create([
            'nombre' => $request->nombre,
            'nick_name' => $request->nick_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'telefono_emergencia' => $request->telefono_emergencia,
            'id_rol' => 2,
        ]);

        $token_acceso = $user->createToken('API TOKEN')->plainTextToken;

        $user->update([
            'token' => $token_acceso,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Usuario creado satisfactoriamente',
            'data' => ['token' => $token_acceso]
            
        ],200);

    }

    public function update(Request $request)
    {

        $usuario = User::find($request->id);

        if (!$usuario) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Usuario no encontrado'
                ],
                400
            );
        }

        $rules = [
            'nombre' => 'required|string|max:100',
            'nick_name' => 'required|string|max:100',
            'telefono' => 'required|string|min:10|max:10',
            'telefono_emergencia' => 'string|min:10',
        ];
        $validator = \Validator::make($request->input(), $rules);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'errors' => $validator->errors()->all()
                ],
                400
            );
        }

        $usuario->update([
            'nombre' => $request->nombre,
            'nick_name' => $request->nick_name,
            'telefono' => $request->telefono,
            'telefono_emergencia' => $request->telefono_emergencia,
        ]);

        $usuario = User::exclude(['id_rol','token'])->find($request->id);
        return response()->json([
            'status' => true,
            'message' => 'Datos de usuario actualizado satisfactoriamente',
            'data' => ['usuario'=>$usuario] 
        ],200);

    }

    public function delete(Request $request)
    {
        $usuario = User::find($request->id);
        if (!$usuario) {
            return response()->json([
                'status' => false,
                'message' => 'Usuario no encontrado'
            ],400);
        }
        
        User::destroy($request->id);
        return response()->json([
            'status' => true,
            'message' => 'Usuario eliminado satisfactoriamente',
            'datos' => $usuario
        ],200);

        if (!$usuario) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Usuario no encontrado'
                ],
                400
            );
        }

        User::destroy($request->id);
        return response()->json(
            [
                'status' => true,
                'message' => 'Usuario eliminado satisfactoriamente',
                'datos' => $usuario
            ],
            200
        );
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|string|max:100',
            'password' => 'required|string',
        ];
        $validator = \Validator::make($request->input(), $rules);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'errors' => $validator->errors()->all()
                ],
                400
            );
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(
                [
                    'status' => false,
                    'errors' => ['No autorizado']
                ],
                401
            );
        }
        $user = User::where('email',$request->email)->first();
        return response()->json([
            'status' => true,
            'message' => 'El usuario fue logeado satisfactoriamente',
            'data' => ['token' => $user->createToken('API TOKEN')->plainTextToken]
            
        ],200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json(
            [
                'status' => true,
                'message' => 'Sesión del usuario cerrado',
            ],
            200
        );
    }
}
