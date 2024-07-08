<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
    
    public function index(){
        return view ('auth.login');
    }

    public function loginproses(Request $request){
       $request->validate([
            'email' => 'required',
            'password' => 'required',
       ]);
       $data = [
            'email' => $request->email,
            'password' => $request->password
       ];

       if(Auth::attempt($data)){
        return redirect()->route('admin.dashboard');
       }else{
        return redirect()->route('login')->with('failed','email atau password salah');
       }
    }

    public function logout(){
        auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil Logout');
    }
        
    public function register (){
        return view('auth.register');
    }

    public function registerproses(Request $request){
       
       $data['name']= $request->nama;
       $data['email']= $request->email;
       $data['password']= Hash::make($request->password);

       User::create($data);

       $login = [
        'email' => $request->email,
        'password' => $request->password
   ];

        if(Auth::attempt($login)){
            return redirect()->route('login')->with('signup','Berhasil Melakukan Signup');
            }else{
            return redirect()->route('register')->with('failed','Gagal Melakukan Register');
        }
     }
}   


