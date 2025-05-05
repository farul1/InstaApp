<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
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
    public function store($postId)
    {
        if (!Post::where('id', $postId)->exists()) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $userId = auth()->id();

        $likeExists = Like::where('user_id', $userId)
                          ->where('post_id', $postId)
                          ->exists();

        if ($likeExists) {
            return response()->json(['message' => 'You already liked this post.'], 400);
        }

        Like::create([
            'user_id' => $userId,
            'post_id' => $postId,
        ]);

        $likeCount = Like::where('post_id', $postId)->count();

        return response()->json([
            'message' => 'Post liked successfully',
            'like_count' => $likeCount,
        ], 201);
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

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($postId)
    {
        $like = Like::where('user_id', auth()->id())
                    ->where('post_id', $postId)
                    ->first();

        if (!$like) {
            return response()->json(['message' => 'Like not found'], 404);
        }

        $like->delete();

        return response()->json(['message' => 'Like removed successfully']);
    }

}
