<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Validator;

class UsersController extends Controller
{


    /**
     * Simple method to register a user and recieve an auth token
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8'
        ]);

        if($validator->fails()){
            return response(['Response' =>  $validator->errors(), 'status' => false], 422);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
      
        $data['token'] =  $user->createToken('MyApp')->accessToken;
        $data['name'] =  $user->name;

        return response(['data' => $data, 'response' => 'Account created successfully!', 'status' => true]);
    }  
     
}