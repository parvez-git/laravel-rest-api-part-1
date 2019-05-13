<?php

namespace Laravel\Http\Controllers\API;

use Laravel\Category;
use Illuminate\Http\Request;
use Laravel\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::all();

        return response()->json($categories, 200);
    } 
}
