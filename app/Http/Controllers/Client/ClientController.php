<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\RegisterUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Country;

class ClientController extends Controller
{
    // public function __construct()
    // {
    //     $this-> middleware('auth'); 
    // }

    public function getClient()
    {
        return view('client/index');
    }

    public function getUpdateAccount()
    {
        if(Auth::check()){
            $user = Auth::user();
            $countries = Country::all();
            return view('client/account/updateAccount', compact('user', 'countries'));
        }else{
            return redirect('/');
        }
    }

    public function postUpdateAccount(Request $request)
    {
        $user = Auth::user();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'id_country' => $request->id_country,
        ];

        if($request->password){
            $data['password'] = bcrypt($request->password);
        }

        $file = $request->avatar;
        if(!empty($file)){
            $data['avatar'] = $file->getClientOriginalName();
        }

        if($user->update($data)){
            if(!empty($file)){
                    $file->move('upload/avatar', $file->getClientOriginalName());
                }
            return redirect('account/update')->with('success', 'Cập nhật tài khoản thành công!');
        }else{
            return redirect('account/update')->withErrors('Email or Password not correct.');
        }
    }
}
