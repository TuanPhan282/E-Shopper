<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getCategory()
    {
        $data = Category::all();
        return view('admin/category/category',compact('data'));
    }
    
    public function getAddCategory(  ) 
    {
        return view('admin/category/add-category');
    }
    public function postAddCategory( Request $request)
    {
        $data = $request->all();

        if(Category::create($data)){
            return redirect('admin/category');
        }else{
            return redirect('admin/category');
        }
    }

    public function deleteCategory( string $id)
    {
        $country = Category::where('id', $id);

        if($country->delete()){
            return redirect('admin/category');
        }else{
            return redirect('admin/category');
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
