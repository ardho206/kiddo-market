<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function index(Request $request)
    // {
    //     if (request('category')) {
    //         $category = Category::firstWhere('slug', request('category'));
    //     }

    //     $categories = Category::all();

    //     return view('products', compact('categories', 'category_slug'), [
    //         "products" => Product::latest()->filter(request(['category']))->get()
    //     ]);
    // }

    public function index(Request $request)
    {
        $category_slug = request('category');

        $categories = Category::all();

        return view('products', compact('categories', 'category_slug'), [
            "products" => Product::latest()->filter(request(['category']))->get()
        ]);
    }

    public function show(Product $product)
    {
        return view('product', [
            'products' => $product
        ]);
    }
}
