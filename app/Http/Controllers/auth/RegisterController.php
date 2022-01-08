<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }
    public function index (){
        return view('auth.register');
    }

    public function store (Request $request){
    //validate the request
    $this->validate($request,[
        'name'=>'required|max:255',
        'username'=>'required|max:255',
        'email'=>'required|email|max:255',
        'password'=>'required|confirmed',
    ]);// this will throw an exception meaning nothing after it will run if it is isn't accepted
    //store the user 
    User::create([
        'name'=>$request->name,
        'username'=>$request->username,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
    ]);
    //sign the user in
    auth()->attempt($request->only('email','password'));
    //redirect the user
    return redirect()->route('dashboard');
    }
}