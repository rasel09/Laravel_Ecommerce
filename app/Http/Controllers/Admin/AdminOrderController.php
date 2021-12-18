<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function showData()
    {
        $orders = Order::latest()->paginate(4);
        return view('admin.order.index', compact('orders'));
    }
    public function view($product_id)
    {
        $orders = Order::find($product_id);
        $orderItems = OrderItem::where('order_id', $product_id)->get();
        $shippings = Shipping::where('order_id', $product_id)->first();
        return view('admin.order.view', compact('orders', 'orderItems', 'shippings'));
    }
    public function destoy($product_id)
    {
        Order::destroy($product_id);
        return redirect()->back();
    }
}