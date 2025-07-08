<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\InsertBlogRequest;
use App\Models\Blog;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
