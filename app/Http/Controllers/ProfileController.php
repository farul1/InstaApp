<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{

    public function show()
    {
        $user = Auth::user();
        $posts = $user->posts()->latest()->get();

        return view('profile.show', compact('user', 'posts'));
    }


    public function showOther($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts()->latest()->get();

        return view('profile.show', compact('user', 'posts'));
    }
}
