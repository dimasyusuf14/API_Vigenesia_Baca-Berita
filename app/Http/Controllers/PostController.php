<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return response()->json([
            'success' => true,
            'message' => 'categories fetched successfully',
            'data' => [
                'posts' => $posts,
            ]
        ], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cover' => 'required', // Tambahkan validasi file
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('cover')) {
            $validatedData['cover'] = $request->file('cover')->store('storage/cover', 'public');
        }

        $post = Post::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Post created successfully',
            'data' => [
                'post' => $post,
            ]
        ], 201);
    }
}
