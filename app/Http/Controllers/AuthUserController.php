<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthUserController extends Controller
{
    protected $successStatus=200;
    public function login()
    {
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $token=$user->createToken('MyApp');
            // $token =  ->accessToken; 
            
            $user->token=$token->accessToken;
            $user->expires_token=$token->token->expires_at;
            return response()->json(
                $user, $this->successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
}
