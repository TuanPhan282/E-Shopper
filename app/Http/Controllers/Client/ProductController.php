<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\Client\AddOrEditProductRequest;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this-> middleware('auth'); 
    }

    public function saveImageControl( $images, $userId){
        $imageNames = [];
    if (!empty($images)) {
        foreach ($images as $val) {
            $imgName = $val->getClientOriginalName(); 
            $imgName2 = 'hinh85x84_' . $imgName; 
            $imgName3 = 'hinh329x380_' . $imgName; 

            $image = Image::read($val);

            // Lưu ảnh gốc
            if(is_dir('upload/product/'. $userId) == false ){
                mkdir('upload/product/'. $userId);
            }
            $image->save(public_path('upload/product/'. $userId.'/' . $imgName));

            // Lưu ảnh resize
            $image->resize(85, 84)->save(public_path('upload/product/' . $userId.'/' . $imgName2));
            $image->resize(329, 380)->save(public_path('upload/product/' . $userId.'/' . $imgName3));

            $imageNames[] = $imgName;
        }
    }

   
        return $dataImages = $imageNames;
    }

    /**
     * Display a listing of the resource.
     */
    public function getMyProduct()
    {
        $data = Product::paginate(5);
        foreach ($data as $product) {
            $images = json_decode($product->images, true);
            $product->first_image = $images[0]?? null;
        }
        return view('client/product/myProduct', compact('data'));
    }

    public function getAddProduct()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('client/product/addProduct', compact('categories', 'brands'));
    }


public function postAddProduct(Request $request)
{
    $data = $request->except(['images']);
    $images = $request->images;
    // dd($images);
    $data['userId'] = Auth::id();
    // dd($data['userId']);

    $data['images'] = json_encode($this->saveImageControl($images, $data['userId']));

    if (Product::create($data)) {
        return redirect('account/my-product')->with('success', 'Create product successfully!');
    } else {
        return redirect('account/add-product')->withErrors('Create product unsuccessfully!');
    }
}


public function getEditProduct(string $id)
    {
        $product = Product::where('id', $id)->first();
        if($product){
            $product->images = json_decode($product->images, true);

            $categoryOfProduct = Category::where('id', $product->id_category)->first();
            $brandOfProduct = Brand::where('id', $product->id_brand)->first();
            $categories = Category::all();
            $brands = Brand::all();
            return view('client/product/editProduct', compact('product','categories', 'brands', 'brandOfProduct', 'categoryOfProduct'));
        }else{
            return redirect('account/my-product')->withError('Product is not found');  
        }
    }


    public function postEditProduct(AddOrEditProductRequest $request, string $id)
    {
        $product = Product::where('id', $id)->first();

        $data = $request->except(['images', 'removeImages']);
        $removeImages = $request->removeImages ?? []; 
        $images = $request->images;

        // dd($removeImages);
        $data['userId'] = Auth::id();

        $currentImages = json_decode($product->images, true);
        if($removeImages){
            foreach ($removeImages as $val) {
                @unlink(public_path('upload/product/'.$data['userId'].'/'. $val));
                @unlink(public_path('upload/product/'.$data['userId'].'/hinh85x84_'. $val));
                @unlink(public_path('upload/product/'.$data['userId'].'/hinh329x380_'. $val));

                $currentImages = array_filter($currentImages, function($item) use ($val){
                    return $item != $val;
                });
            }
        }        

        $data['images'] = json_encode(array_merge($currentImages, $this->saveImageControl($images, $data['userId'])));

        if ($product->update($data)) {
            return redirect('account/my-product')->with('success', 'Edit product successfully!');
        } else {
            return redirect('account/edit-product')->withErrors('Edit product unsuccessfully!');
        }
    }



    public function deleteProduct(string $id){
        $product = Product::where('id', $id);

        if($product->delete()){
            return redirect('account/my-product')->with('success', 'Delete product successfully!');
        }else{
            return redirect('account/my-product')->withErrors('Delete product unsuccessfully!');
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
