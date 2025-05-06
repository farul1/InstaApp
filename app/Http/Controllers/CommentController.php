<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $postId)
    {
        // $request->validate([
        //     'comment' => 'required|string|max:500',
        // ]);

        // $post = Post::findOrFail($postId);

        // $comment = Comment::create([
        //     'user_id' => auth()->id(),
        //     'post_id' => $postId,
        //     'comment' => $request->comment,
        // ]);

        // return response()->json([
        //     'message' => 'Comment added successfully',
        //     'comment' => $comment
        // ]);
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $post = Post::findOrFail($postId);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $validatedData['comment'],
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
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
    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        if (Auth::user()->id == $comment->user_id || Auth::user()->is_admin) {
            $comment->delete();
            return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
        }
        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
    }

}
