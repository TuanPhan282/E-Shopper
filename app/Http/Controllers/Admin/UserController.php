<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Http\Requests\Admin\InsertBlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Country;
use App\Models\Blog;


class UserController extends Controller
{
    public function __construct()
    {
        $this-> middleware('auth'); 
    }

    public function index()
    {
        $user = Auth::user();
        return view('admin/profile', compact('user'));
    }

    public function postUpdateProfile(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        $data = $request->all();

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = $user->password;
        }
        
        if($user->update($data)){
            return redirect('/profile');
        }else{
            return redirect('/profile');
        }
    }

    // Country
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
            return redirect('country');
        }else{
            return redirect('country');
        }
    }

    public function deleteCountry( string $id)
    {
        $country = Country::where('id', $id);

        if($country->delete()){
            return redirect('country');
        }else{
            return redirect('country');
        }
    }

    // Blog
    public function getBlog()
    {
        // $data = Blog::all();
        $data = Blog::paginate(3);
        return view('admin/blog/list-blog',compact('data'));
    }

    public function getAddBlog(  ) 
    {
        return view('admin/blog/add-blog');
    }
    public function postAddBlog( InsertBlogRequest $request)
    {
        $data = $request->all();
        $file = $request->image;
        if(!empty($file)){
            $data['image'] = $file->getClientOriginalName();
        }

        if(Blog::create($data)){
            if(!empty($file)){
                    $file->move('upload/blog/image', $file->getClientOriginalName());
                }
            return redirect('list-blog');
        }else{
            return redirect('list-blog');
        }
    
    }
    public function getEditBlog(string $id)
    {
        $data = Blog::findOrFail($id);

        return view('admin/blog/edit-blog',compact('data'));
    }
    public function postEditBlog( InsertBlogRequest $request)
    {
        $blog = Blog::findOrFail($request->id);

        $data = $request->all();
        
        $file = $request->image;
        if(!empty($file)){
            $data['image'] = $file->getClientOriginalName();
        }
        
        if($blog->update($data)){
            if(!empty($file)){
                    $file->move('upload/blog/image', $file->getClientOriginalName());
                }
            return redirect('list-blog');
        }else{
            return redirect('list-blog');
        }
    }
    public function deleteBlog( string $id)
    {
        $blog = Blog::where('id', $id);

        if($blog->delete()){
            return redirect('list-blog');
        }else{
            return redirect('list-blog');
        }
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
