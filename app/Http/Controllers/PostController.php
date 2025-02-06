<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }
    public function indexme()
    {
        $posts = Post::where('author', Auth::user()->id)->get();
        return PostResource::collection($posts);
    }
    public function showpost($id)
    {
        $post = Post::find($id);
        return new PostResource($post);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'news_content' => 'required',
        ]);
        $validated['author'] = Auth::user()->id;
        $post = Post::create($validated);
        return new PostResource($post);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'news_content' => 'required',
        ]);
        $post = Post::find($id);
        $post->update($validated);
        return new PostResource($post);
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json(null, 204);
    }
}
