<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(6);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        // form validation
        $request->validate([
            'product_name' => 'required|max:80|unique:products,product_name',
            'brind_id' => 'required',
            'category_id' => 'required',
            'product_code' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'short_description' => 'required|min:50',
            'long_description' => 'required|min:50',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);

        // image 
        $image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($image->getClientOriginalExtension());
        $image_name = $name_gen . '.' . $image_ext;
        $up_location = 'website/img/product/uplode/';
        $last_img = $up_location . $image_name;
        $image->move($up_location, $image_name);
        Product::create([
            'product_name' => $request->product_name,
            'slug' => Str::slug($request->product_name),
            'brind_id' => $request->brind_id,
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $last_img,
        ]);
        return redirect()->route('product.index')->with('success', 'Product Added Success');
    }

    public function edit($id)
    {
        $products = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.edit', compact('products', 'brands', 'categories'));
    }
    public function update(Request $request, $id)
    {
        // form validation
        $request->validate([
            'product_name' => 'required|max:80|unique:products,product_name',
            'brind_id' => 'required',
            'category_id' => 'required',
            'product_code' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'short_description' => 'required|min:50',
            'long_description' => 'required|min:50',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);

        // image 
        $image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($image->getClientOriginalExtension());
        $image_name = $name_gen . '.' . $image_ext;
        $up_location = 'website/img/product/uplode/';
        $last_img = $up_location . $image_name;
        $image->move($up_location, $image_name);

        // image unlink
        $img = Product::find($id);
        $old_img = $img->image;
        unlink($old_img);

        Product::find($id)->update([
            'product_name' => $request->product_name,
            'slug' => Str::slug($request->product_name),
            'brind_id' => $request->brind_id,
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $last_img,
        ]);
        return redirect()->route('product.index')->with('success', 'Product Update Success');
    }
    public function destroy($id)
    {
        // image delete
        $img = Product::find($id);
        $old_img = $img->image;
        unlink($old_img);
        Product::destroy($id);
        return redirect()->route('product.index')->with('success', 'Product Deleted Success');
    }
    public function inactive($id)
    {
        Product::find($id)->update(['status' => 0]);
        return redirect()->route('product.index')->with('success', 'Product Inactive Success');
    }
    public function active($id)
    {
        Product::find($id)->update(['status' => 1]);
        return redirect()->route('product.index')->with('success', 'Product Active Success');
    }
}