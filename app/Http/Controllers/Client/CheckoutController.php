<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getCheckout()
    {
        $cart = session()->get('cart');
        if($cart){
            foreach($cart as $key => $val){
                $cart[$key]['images'] = json_decode($val['images'],true);
            }
        }
        return view('client/checkout/checkout', compact('cart'));
    }
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
