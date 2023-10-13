<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Unlike;
use Illuminate\Http\Request;

class UnlikeController extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Post $post, Request $request)
    {
        if($post->likedBy($request->user())){
            $request->user()->likes()->where('post_id', $post->id)->delete();
        }
        if ($post->UnLikedBy($request->user())) {
            return back();
        }
        $post->unLikes()->create([
            'user_id' => $request->user()->id,
            'post_id' => $post->id,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Unlike $unlike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unlike $unlike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unlike $unlike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Post $post)
    {
        $request->user()->unLikes()->where('post_id', $post->id)->delete();
        return back();
    }
}
