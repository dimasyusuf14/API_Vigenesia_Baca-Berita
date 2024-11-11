<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;

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
            // 'cover' => 'required|image|mimes:jpg,png,jpeg|max:10240', // Tambahkan validasi file
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');

            $manager = new ImageManager(Driver::class);
            $coverRead = $manager->read($cover);
            $coverEncode = $coverRead->encode(new AutoEncoder(quality: 50));



            $fileName = uniqid('cover_') . '.' . $cover->getClientOriginalExtension();
            $coverEncode->save(public_path('storage/cover/' . $fileName));
        }

        $post = Post::create([
            'cover' => $fileName,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post created successfully',
            'data' => [
                'post' => $post,
            ]
        ], 201);
    }
}
