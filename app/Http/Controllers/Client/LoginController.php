<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(Request $request)
    {
        if(Auth::check()){
            return redirect('/');
        }else{
            return view('client/login');
        }
    }   
    
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/')->with('success', 'Đăng xuất thành công!');
    }   

    public function postLogin(Request $request)
    {
        
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];

        $remember = false;

        if($request->remember_me){
            $remember = true;
        }

        if(Auth::attempt($login, $remember)){
            return redirect('/')->with('success', 'Login Successfully!');
        }else{
            return redirect()->back()->withErrors('Email or Password not correct.');
        }
    }
}
