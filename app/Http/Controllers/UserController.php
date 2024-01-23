<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request){
        
        $validator= Validator::make($request->all(), [
            'name' => 'required|max:55',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'cpassword' => 'required|min:6|same:password'
        ],[
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'cpassword.required' => 'Confirm Password is required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "message" => $validator->getMessageBag()
            ]);
        }
        else{
            $user= new User();
            $user->name= $request->name;
            $user->email= $request->email;
            $user->password= Hash::make($request->password);
            $user->save();
            return response()->json([
                "status" => 200,
                "message" => "User created successfully"
            ]);
        }
    }
}
