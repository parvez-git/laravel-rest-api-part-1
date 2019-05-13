<?php

namespace Laravel\Http\Controllers;

use Laravel\Tag;
use Laravel\Post;
use Laravel\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $posts = Post::with(['user','category','tags'])->latest()->get();

        return view('posts', compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('create-post', compact('categories','tags'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $post = auth()->user()->posts()->create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.index');
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('edit-post', compact('post','categories','tags'));
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255|unique:posts,title,' . $post->id,
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        $post->tags()->detach();

        return redirect()->route('posts.index');
    }
}
