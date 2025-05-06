<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
/**
 * Display a listing of the resource.
 */
    public function index(Request $request)
    {
        $posts = Post::with(['user', 'likes', 'comments.user'])->latest()->get();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'List of posts',
                'posts' => $posts
            ], 200);
        }

        return view('home', compact('posts'));
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
         $validatedData = $request->validate([
             'caption' => 'nullable|string|max:255',
             'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
         ]);

         $imagePath = $request->file('image')->store('posts', 'public');

         $post = Post::create([
             'user_id' => auth()->id(),
             'caption' => $validatedData['caption'],
             'image_path' => $imagePath,
         ]);

         return response()->json([
             'message' => 'Post created successfully',
             'post' => $post,
         ], 201);
     }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::with('user', 'likes', 'comments')->findOrFail($id);

        return response()->json([
            'message' => 'Post details',
            'post' => $post
        ], 200);
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
