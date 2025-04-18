<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class Login extends Controller
{
    public function index(){

        return view("pages.login");
    }


    public function register(){
        return view("pages.register");
    }


    public function create(Request $request){   
        $data = $request->validate([
            'username'      => 'required|min:4',
            'email'         => 'required',
            'password'      => 'required|min:8|confirmed',
            'idnum'         => 'required',
        ]);

        User::create([
            'name'      => $data['username'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
            'idnum'     => $data['idnum'],
        ]);


        return redirect()->route('home')->with('msg','Registered Successfuly');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'name'      => 'required',
            'password'  => 'required'
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->with([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }
}
