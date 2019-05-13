<?php

namespace Laravel\Http\Controllers\API;

use Laravel\Tag;
use Laravel\Post;
use Laravel\Category;
use Illuminate\Http\Request;
use Laravel\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user','category','tags'])->latest()->get();

        return response()->json($posts, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'category_id' => 'required'
        ]);
        
        $post = new Post();

        $post = $post->create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id
        ]);

        $post->tags()->attach($request->tags);

        if ($post) {
            $post = Post::with(['user','category','tags'])->where('id',$post->id)->first();
        }

        return response()->json($post, 201);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255|unique:posts,title,' . $post->id,
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::findOrFail($post->id);

        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->save();

        $post->tags()->sync($request->tags);

        if ($post) {
            $post = Post::with(['user','category','tags'])->findOrFail($post->id);
        }

        return response()->json($post, 200);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        $post->delete();
        $post->tags()->detach();

        return response()->json('Deleted', 200);
    }
}
