<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $category_slug = $categories->slug;

        return view('categories', compact('categories', 'category_slug'));
    }
}
