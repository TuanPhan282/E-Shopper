<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    public function postAddToCartAjax(Request $request)
    {
        $product = Product::where('id', $request->id)->first()->toArray();
        $product['qty'] = $request->qty;

        // session()->forget('cart');
        $cart = session()->get('cart');
        if(session()->has('cart')){
            $has_id = false;
            foreach($cart as $key => $val){
                if($val['id'] == $product['id']){
                    $cart[$key]['qty'] = $request->qty;
                    $has_id = true;
                    break;
                }
            }
            if(!$has_id){
                $cart[] = $product;
            }

            session()->put('cart', $cart);
            
            return response()->json(['product' => $cart]);
        }else{
            session()->push('cart', $product);      
            return response()->json(['product' => $product]);     
        }
    }


    public function getCart()
    {
        $cart = session()->get('cart');
        if($cart){
            foreach($cart as $key => $val){
                $cart[$key]['images'] = json_decode($val['images'],true);
            }
        }
        // dd($cart);
        return view('client/cart/cart', compact('cart'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
