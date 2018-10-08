<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
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
            return response()->json(
                $user, $this->successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    public function register(Request $request){
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $token=  $user->createToken('MyApp'); 
        $user->token=$token->accessToken;

        return response()->json($user, $this-> successStatus);
    }
}
