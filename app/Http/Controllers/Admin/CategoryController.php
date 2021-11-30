<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        // form validate 
        $request->validate([
            'category_name' => 'required|min:5|max:50|unique:categories,category_name',
        ]);
        Category::create([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
        ]);
        return redirect()->route('category.index')->with('success', 'Category Added Success');
    }
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }
    public function update(Request $request, $id)
    {
        // form validate 
        $request->validate([
            'category_name' => 'required|min:5|max:50|unique:categories,category_name',
        ]);
        Category::find($id)->update([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
        ]);
        return redirect()->route('category.index')->with('success', 'Category Update Success');
    }
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('category.index')->with('success', 'Category Deleted Success');
    }
    public function inactive($id)
    {
        Category::find($id)->update(['status' => 0]);
        return redirect()->route('category.index')->with('success', 'Category Inactive Success');
    }
    public function active($id)
    {
        Category::find($id)->update(['status' => 1]);
        return redirect()->route('category.index')->with('success', 'Category Active Success');
    }
}