<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        print_r($request->all());
        return $request->all();
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required|email|unique:users',
        //     'password'=>'required|min:6|max:12'
        // ]);
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email; 
        // $user->password = Hash::make($request->password);
        // $user->save();
        // return redirect()->route('login')->with('success','User created successfully');
    }
}
