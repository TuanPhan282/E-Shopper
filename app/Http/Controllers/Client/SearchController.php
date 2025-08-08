<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class SearchController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function postSearchPriceAjax(Request $request)
    {
        $min = $request->min;
        $max = $request->max;
        $products = Product::whereBetween('price', [$min, $max])->paginate(6);

        // dd($products);
        foreach ($products as $product) {
            $images = json_decode($product->images, true);
            $product->first_image = $images[0]?? null;
        }

        return response()->json([$products]);
    }


    public function getSearch(Request $request)
    {
        $query = Product::query();

        if($request->name){
            $query->where('name', 'like', '%'. $request->name .'%') ;
        }
        
        if ($request->filled('price')) {
            $range = explode('-', $request->price);
            $min = (float) $range[0];
            $max = (float) $range[1];
            $query->whereBetween('price', [$min, $max]);
        }

        if ($request->filled('id_category')) {
            $query->where('id_category', $request->id_category);
        }

        if ($request->filled('id_brand')) {
            $query->where('id_brand', $request->id_brand);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $products = $query->paginate(5);
        foreach ($products as $product) {
            $images = json_decode($product->images, true);
            $product->first_image = $images[0]?? null;
        }

        $brands = Brand::all();
        $categories = Category::all();
        return view('client/searchProduct', compact('products',  'brands', 'categories'));
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
