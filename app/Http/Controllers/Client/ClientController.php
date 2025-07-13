<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\RegisterUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Country;

class ClientController extends Controller
{
    // public function __construct()
    // {
    //     $this-> middleware('auth'); 
    // }

    public function getClient()
    {
        $productLatest = Product::OrderBy('created_at','desc')->take(6)->get();
        foreach ($productLatest as $product) {
            $images = json_decode($product->images, true);
            $product->first_image = $images[0]?? null;
        }
        // dd($productLatest);
        return view('client/index', compact('productLatest'));
    }

    public function getProductDetail(string $id)
    {
        $product = Product::where('id', $id)->first();
        // $userId = Auth::id();
        
        $product->images = json_decode($product->images, true);
        // dd($productLatest);
        return view('client/product/detailProduct', compact('product'));
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
