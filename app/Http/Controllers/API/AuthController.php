<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // Register User
    public function register(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password)
        ]);

        $token = $user->createToken('Token')->accessToken;
        return response()->json(['token'=>$token, 'user'=> $user], 200);
    }

    // Login
    public function login(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if(auth()->attempt($data)){
            $user =  auth()->user();
            $token = auth()->user()->createToken('Token')->accessToken;
            return response()->json(['token'=>$token, 'user'=> $user], 200);
        }else{
            return response()->json(['error'=>'unauthorized'], 401);
        }
    }

    // get user
    public function getUserInfo(){
        // if(auth()->user()){
        //     return response()->json(['message'=>'success'], 200);
        // }
        // else{
        //     return response()->json(['error'=>'aaa'], 401);;
        // };
        $user =  auth()->user();
        return response()->json(['message'=>'success', 'user'=> $user], 200);
    }
}
