<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->latest()->get();
        $products = Product::where('status', 1)->latest()->get();
        $latestProducts = Product::where('status', 1)->limit(3)->get();
        return view('frontend.index', compact('categories', 'products', 'latestProducts'));
    }
    // --------------------------------- product-detels-------------------------
    public function productDedalis($id)
    {
        $categories = Category::where('status', 1)->latest()->get();
        $products = Product::find($id);
        $category_id = $products->category_id;
        $releted_product = Product::where('category_id', $category_id)->latest()->get();
        // $carts = Cart::all();
        return view('frontend.view_detels', compact('categories', 'products', 'releted_product',));
    }
}