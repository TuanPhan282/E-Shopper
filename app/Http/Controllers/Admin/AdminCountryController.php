<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class AdminCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getCountry()
    {
        $data = Country::all();
        return view('admin/country/country',compact('data'));
    }
    
    public function getAddCountry(  ) 
    {
        return view('admin/country/add-country');
    }
    public function postAddCountry( Request $request)
    {
        $data = $request->all();

        if(Country::create($data)){
            return redirect('admin/country');
        }else{
            return redirect('admin/country');
        }
    }

    public function deleteCountry( string $id)
    {
        $country = Country::where('id', $id);

        if($country->delete()){
            return redirect('admin/country');
        }else{
            return redirect('admin/country');
        }
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
