<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function store(Request $request)
    {


        // validate 
        // $request->validate([
        //     'name' => 'required|max:20|unique:shippings,name',
        //     'email' => 'required|max:120|unique:shippings,email',
        //     'phone' => 'required|max:60|unique:shippings,phone',
        //     'address' => 'required',
        //     'state' => 'required',
        //     'post_code' => 'required',
        // ]);


        // order insert 
        $order_id = Order::insertGetId([
            'user_id' => Auth::user()->id,
            'invoice_no' => mt_rand(10000000, 99999999),
            'payment_type' => $request->payment_type,
            'totle' => $request->totle,
            'subtotle' => $request->subtotle ?? $request->totle,
            'copon_discount' => $request->discoute,

        ]);

        // order item insert
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->product_id,
                'product_qty' => $cart->qty,

            ]);
        }

        // shipping insert 
        Shipping::insert([
            'order_id' => $order_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'state' => $request->state,
            'post_code' => $request->post_code,

        ]);

        // order proce copon delete

        if (Session::has('copon')) {
            Session()->forget('copon');
        }
        $cart = Cart::where('user_ip', request()->ip());
        $cart->delete();

        return redirect()->route('orderSuccess')->with('success', 'Order place success');
    }
    public function orderComplate()
    {
        $categories = Category::where('status', 1)->latest()->get();
        return view('frontend.order_complate', compact('categories'));
    }
}