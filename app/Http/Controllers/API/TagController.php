<?php

namespace Laravel\Http\Controllers\API;

use Laravel\Tag;
use Illuminate\Http\Request;
use Laravel\Http\Controllers\Controller;

class TagController extends Controller
{
    public function tags()
    {
        $tags = Tag::all();

        return response()->json($tags, 200);
    }
}
