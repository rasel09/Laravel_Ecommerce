<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }
    public function create()
    {
        return view('admin.brand.create');
    }
    public function store(Request $request)
    {
        // form validate 
        $request->validate([
            'brand_name' => 'required|min:5|max:50|unique:brands,brand_name',
        ]);
        Brand::create([
            'brand_name' => $request->brand_name,
            'slug' => Str::slug($request->brand_name),
        ]);
        return redirect()->route('brand.index')->with('success', 'Brand Added Success');
    }
    public function edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }
    public function update(Request $request, $id)
    {
        // form validate 
        $request->validate([
            'brand_name' => 'required|min:5|max:50|unique:brands,brand_name',
        ]);
        Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'slug' => Str::slug($request->brand_name),
        ]);
        return redirect()->route('brand.index')->with('success', 'Brand Update Success');
    }
    public function destroy($id)
    {
        Brand::destroy($id);
        return redirect()->route('brand.index')->with('success', 'Brand Deleted Success');
    }
    public function inactive($id)
    {
        Brand::find($id)->update(['status' => 0]);
        return redirect()->route('brand.index')->with('success', 'Brand Inactive Success');
    }
    public function active($id)
    {
        Brand::find($id)->update(['status' => 1]);
        return redirect()->route('brand.index')->with('success', 'Brand Active Success');
    }
}