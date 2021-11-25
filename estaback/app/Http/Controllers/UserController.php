<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   //enviamos el gmail y el password de la persona 
    //diciendo di esta autentificado y dar una respuesta
    public function login(Request $request){
        if (!Auth::attempt($request->all())){
            //si no existe el usuario enviara respuesta de que no existe el usuario
            return response()->json(["res"=>"No existe el usuario"]);
        }
        //si existe el usuario enviamos igual al email solo pedimos el primer dato
        $user=User::where('email',$request->email)->firstOrFail();
        //creamos el token 
        $token=$user->createToken('auth_token')->plainTextToken;
        //mandamos en json el token con el usuario
        return response()->json(['token'=>$token,'user'=>$user]);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['res'=>'salido exitosamente'],200);
    }
}
