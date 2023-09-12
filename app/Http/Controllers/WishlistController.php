<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Maize\Markable\Models\Favorite;

class WishlistController extends Controller
{
    public function wishlist()
    {
        $products = Product::whereHasFavorite(
            auth()->user()
        )->get();
        // dd($products);
        return view('wishlist',compact('products'));
    }

    public function favoriteAdd($id)
    {
        $product = Product::find($id);
        $user = auth()->user();

        if(Favorite::has($product, $user)){
            session()->flash('success', 'Product is already in favorite');
            
            return response()->json(['message' => 'Product is already in favorite']);
        }

        Favorite::add($product, $user);
        session()->flash('success', 'Product is Added to Favorite Successfully !');

        return response()->json(['message' => 'Product added to favorites successfully']);
    }

    public function favoriteRemove($id)
    {
        $product = Product::find($id);
        $user = auth()->user();
        Favorite::remove($product, $user);
        session()->flash('success', 'Product is Remove to Favorite Successfully !');

        return redirect()->route('wishlist');
    }
}
