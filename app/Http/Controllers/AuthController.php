<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('welcome');
    }

    public function postlogin(Request $request){
        $cek = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
    //<input name="email" type="email" class="form-control">

        if(Auth::attempt($cek)){
            $user = Auth::user();

            if($user->role == 'admin'){
                return redirect()->route('adminview');
            }
            else{
                return redirect()->route('menuview');
            }
        }
        return back()->with('error','Email atau password salah');
    }

    public function register(){
        return view('register');
    }

    public function postregister(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required'
        ]);

        //<input name="name" type="text" class="form-control">

        User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
        'role'=>'customer'
        ]);
        
        return redirect()->route('loginview');
    }

    public function admin(){
        return view('admin');
    }

    public function menu(){
        return view('menu');
    }
}
