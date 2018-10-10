<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Store;
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
        $user = User::create([
            'name'      =>  $input['name'],
            'username'  =>  $input['username'],
            'email'     =>  $input['email'],
            'phone'     =>  $input['phone'],
            'password'  =>  $input['password'],
            'user_type' =>  $input['user_type']
        ]); 
        if($input['user_type']==2){
            $store=Store::create([
                'user_id'=>$user['id'],
                'name'   => $input['store_name'],
                'address'=> $input['store_address'],
                'lat'    =>  $input['lat'],
                'lng'    =>  $input['lng']
            ]);
        }
        $token=  $user->createToken('MyApp'); 
        $user->token=$token->accessToken;
        return response()->json($user, $this-> successStatus);
    }
}
