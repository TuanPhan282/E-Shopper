<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Rate;
use App\Models\Comment;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    // --- Blog
    public function getBlogList()
    {
        $data = Blog::paginate(3);
        return view('client/blog/blogList',compact('data'));
    }

    public function getBlogSingle(string $id)
    {
        $data = Blog::findOrFail($id);
        $commentsLevel0 = Comment::where('id_blog', $id)->where('level', 0)
                   ->orderBy('created_at', 'desc')
                   ->get();

        $commentsLevels = Comment::where('id_blog', $id)->where('level', '!=' ,0)
                   ->orderBy('created_at', 'desc')
                   ->get();

        // Tìm rate nếu có (giả sử mỗi bài viết có 1 rate theo id)
        $rateRecord = Rate::where('id_blog', $id)->first();
        $rate = $rateRecord ? $rateRecord : null;

        $averageRating = round(Rate::where('id_blog', $id)->avg('rate'),1);

        // Bài viết trước
        $prev = Blog::where('id', '<', $data->id)
                    ->orderBy('id', 'desc')
                    ->first();

        // Bài viết sau
        $next = Blog::where('id', '>', $data->id)
                    ->orderBy('id', 'asc')
                    ->first();
        
        return view('client/blog/blogSingle', compact('data', 'prev', 'next', 'rate', 'averageRating', 'commentsLevel0', 'commentsLevels'));
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
    
    // ---- Rating stars
    public function postRateAjax(Request $request)
    {
        $data = [
            'rate' => $request->rate,
            'id_blog' => $request->id_blog,
            'id_user' => Auth::id(),
        ];

            $rate = Rate::where('id_blog', $request->id_blog)
                    ->where('id_user', Auth::id()) // Chỉ cho user cập nhật rate của chính họ
                    ->first();
    
            if ($rate) {
                // Nếu tồn tại thì cập nhật
                if ($rate->update($data)) {
                    return response()->json(['data' => 'Đánh giá thành công']);
                } else {
                    return response()->json(['data' => 'Đánh giá thất bại']);
                }
            }else{
                if (Rate::create($data)) {
                    return response()->json(['data' => 'Đánh giá thành công']);
                } else {
                    return response()->json(['data' => 'Đánh giá thất bại']);
                }
        }
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
