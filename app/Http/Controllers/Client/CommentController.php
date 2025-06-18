<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
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

    // Comment
    public function postCommentAjax(Request $request)
    {
        $user = Auth::user();
        $data = [
            'cmt' => $request->cmt,
            'id_blog' => $request->id_blog,
            'id_user' => $user->id,
            'name' => $user->name,
            'avatar' => $user->avatar,
            'level' => $request->level,
        ];

        if (Comment::create($data)) {
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['data' => 'Comment thất bại']);
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
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
