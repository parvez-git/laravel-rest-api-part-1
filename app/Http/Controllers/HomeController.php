<?php

namespace Laravel\Http\Controllers;

use Laravel\Post;
use Laravel\Tag;
use Laravel\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with(['user','category','tags'])->latest()->get();
        
        return view('home', compact('posts'));
    }


    public function welcome()
    {
        $posts = Post::with(['user','category','tags'])->latest()->get();
        
        return view('welcome', compact('posts'));
    }
}
