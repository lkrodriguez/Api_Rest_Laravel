<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller{
   

    
    // Crear Usuario para Login
    public function store(Request $request)
    {
        $input = $request->all();  
        //encriptar contraseña
        $input['password'] = Hash::make($request->password);    
        User::create($input);
        return response()->json([ 
            'res' => true,
            'message' => 'Usuario creado correctamente' 
        ], 200);
    }


    //Inicio de sesion 
    public function login (Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        if (!is_null($user) && 
        Hash::check($request->password, $user->password)
         ) 
         {
             $user->api_token = str::random(100);
             $user->save();
            return response()->json([ 
                'res' => true,
                'token' => $user->api_token,
                'message' => 'Bienvenido' 
            ], 200);           
        }
        else{
            return response()->json([ 
                'res' => false,
                'message' => 'Ceunta o password Incorrectos' 
            ], 200);
        }
    }
    

    public function logout()
    {
        $user = auth()->user();
        $user->api_token = null;
        $user->save();
        return response()->json([ 
            'res' => true,
            'message' => 'Salio del Sistema' 
        ], 200); 

    }

    
    
}
