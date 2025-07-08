<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class AdminBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getBrand()
    {
        $data = Brand::all();
        return view('admin/brand/brand',compact('data'));
    }
    
    public function getAddBrand(  ) 
    {
        return view('admin/brand/add-brand');
    }
    public function postAddBrand( Request $request)
    {
        $data = $request->all();

        if(Brand::create($data)){
            return redirect('admin/brand');
        }else{
            return redirect('admin/brand');
        }
    }

    public function deleteBrand( string $id)
    {
        $country = Brand::where('id', $id);

        if($country->delete()){
            return redirect('admin/brand');
        }else{
            return redirect('admin/brand');
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
