<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try{
            $validate=$this->validate($request,[
                'email'=>'required',
                'password'=>'required',
            ]);
            if(Auth::attempt($validate)){
                $data=Auth::user();
                $token=$data->createToken('agri_token');
                return response()->json(['user'=>$data,'token'=>$token->plainTextToken],200);
            }else{
                return response()->json(['error' => 'Invalid Credentials'], 401);
            }
        }catch (\Exception $ex) {
            return response()->json(['error' => 'Invalid Credentials'], 401);
        }
    }
}
