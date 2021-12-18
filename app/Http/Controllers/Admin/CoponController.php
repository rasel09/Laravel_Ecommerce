<?php

namespace App\Http\Controllers\Admin;

use App\Models\Copon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoponController extends Controller
{
    public function index()
    {
        $copons = Copon::latest()->paginate(3);
        return view('admin.copon.index', compact('copons'));
    }
    public function create()
    {
        return view('admin.copon.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'copon_name' => 'required|max:50|unique:copons,copon_name',
            'discoute' => 'required',
        ]);
        Copon::create([
            'copon_name' => strtoupper($request->copon_name),
            'discoute' => $request->discoute,
        ]);
        return redirect()->route('copon.index')->with('success', 'Copon Added success');
    }
    public function edit($id)
    {
        $copons = Copon::find($id);
        return view('admin.copon.edit', compact('copons'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'copon_name' => 'required|max:50|unique:copons,copon_name',
            'discoute' => 'required',
        ]);
        Copon::find($id)->update([
            'copon_name' => strtoupper($request->copon_name),
            'discoute' => $request->discoute,
        ]);
        return redirect()->route('copon.index')->with('success', 'Copon Update success');
    }
    public function destroy($id)
    {
        Copon::destroy($id);
        return redirect()->route('copon.index')->with('success', 'Copon Deleted success');
    }
    public function inactive($id)
    {
        Copon::find($id)->update(['status' => 0]);
        return redirect()->route('copon.index')->with('success', 'Copon Inactive success');
    }
    public function active($id)
    {
        Copon::find($id)->update(['status' => 1]);
        return redirect()->route('copon.index')->with('success', 'Copon Active success');
    }
}