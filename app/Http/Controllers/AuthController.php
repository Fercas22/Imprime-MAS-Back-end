<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function create(Request $request){
        $rules = [
            'nombre' => 'required|string|max:100',
            'nick_name' => 'required|string|max:100',
            'email' => 'required|string|max:100|unique:users',
            'password' => 'required|string|min:8',
            'telefono' => 'required|string|min:10',
            'telefono_emergencia' => 'required|string|min:10',
        ];
        $validator = \Validator::make($request->input(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ],400);
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
            'token' => $token_acceso
        ],200);

    }

    public function update(Request $request){

        $usuario = User::find($request->id);

        if (!$usuario) {
            return response()->json([
                'status' => false,
                'errors' => 'Usuario no encontrado'
            ],400);
        }

        $rules = [
            'nombre' => 'required|string|max:100',
            'nick_name' => 'required|string|max:100',
            'telefono' => 'required|string|min:10',
            'telefono_emergencia' => 'required|string|min:10',
            'id_rol' => 'required|string|min:1',
            
        ];
        $validator = \Validator::make($request->input(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ],400);
        }
        $usuario->update([
            'nombre' => $request->nombre,
            'nick_name' => $request->nick_name,
            'telefono' => $request->telefono,
            'telefono_emergencia' => $request->telefono_emergencia,
            'id_rol' => $request->id_rol,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Datos de usuario actualizado satisfactoriamente',
            'token' => $usuario
        ],200);

    }

    public function delete(){
        
    }

    public function login(Request $request){
        $rules = [
            'email' => 'required|string|max:100',
            'password' => 'required|string',
        ];
        $validator = \Validator::make($request->input(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ],400);
        }
        if(!Auth::attempt($request->only('email','password'))){
            return response()->json([
                'status' => false,
                'errors' => ['No autorizado']
            ],401);
        }
        $user = User::where('email',$request->email)->first();
        return response()->json([
            'status' => true,
            'message' => 'El usuario fue logeado satisfactoriamente',
            'data' => $user,
            'token' => $user->createToken('API TOKEN')->plainTextToken
        ],200);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message' => 'Sesión del usuario cerrado',
        ],200);
    }
}
