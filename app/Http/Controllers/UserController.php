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
            'password' => 'required|min:5|max:255',
            'cpassword' => 'required|min:5|same:password'
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

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required|min:5|max:255',
        ],[
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "message" => $validator->getMessageBag()
            ]);
        }
        else{
            $user= User::where('email',$request->email)->first();
            if(!$user || !Hash::check($request->password,$user->password)){
                return response()->json([
                    "status" => 401,
                    "message" => "Email or Password is incorrect"
                ]);
            }
            else{
                $request->session()->put('user',$user);
                return response()->json([
                    "status" => 200,
                    "message" => "User logged in successfully"
                ]);
            }
        }
    }

    public function logout(Request $request){
        if($request->session()->has('user')){
            $request->session()->pull('user');
            return redirect('/login');
        }
        else{
            return response()->json([
                "status" => 400,
                "message" => "User not logged in"
            ]);
        }
    }

    public function profile(Request $request){
        return view('profile');
    }
    // guestLogin
    public function guestLogin(Request $request){
        $user= User::find(1);
        $request->session()->put('user',$user);
        return response()->json([
            "status" => 200,
            "message" => "Guest logged in successfully"
        ]);
    }
}
