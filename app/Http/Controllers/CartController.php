<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Copon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //  ----------------------- add to Cart ----------------------
    public function showCart(Request $request, $cart_id)
    {
        $check = Cart::where('product_id', $cart_id)->where('user_ip', request()->ip())->first();
        if ($check) {
            Cart::where('product_id', $cart_id)->where('user_ip', request()->ip())->increment('qty');
            return redirect()->route('home')->with('success', 'Product Added on Cart');
        } else {
            Cart::create([
                'product_id' => $cart_id,
                'qty' => 1,
                'user_ip' => request()->ip(),
                'price' => $request->price,
            ]);
            return redirect()->route('home')->with('success', 'Product Added on Cart');
        }
    }
    // ----------------------------- Cart page ---------------------------
    public function cartpage()
    {
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $categories = Category::latest()->get();
        $subtotle = Cart::all()->where('user_ip', request()->ip())->sum(function ($t) {
            return $t->price * $t->qty;
        });
        return view('frontend.cart', compact('carts', 'categories', 'subtotle'));
    }

    // --------------------------------- cart remove -----------------------------
    public function cartRemove($cart_id)
    {
        Cart::destroy($cart_id);
        return redirect()->route('cartPage')->with('success', 'Cart Deleted success');
    }
    // ---------------------------------- Cart Update --------------------------
    public function cartUpdate(Request $request, $cart_id)
    {
        Cart::find($cart_id)->update([
            'qty' => $request->qty,
        ]);
        return redirect()->route('cartPage')->with('success', 'Cart Updated success');
    }

    // ----------------------- copon apply 

    public function applyCopon(Request $request)
    {
        $check = Copon::where('copon_name', $request->copon_name)->first();
        if ($check) {
            Session::put('copon', [
                'copon_name' => $check->copon_name,
                'discoute' => $check->discoute,
            ]);
            return redirect()->route('cartPage')->with('success', 'Apply Copon Successfule');
        } else {
            return redirect()->route('cartPage')->with('success', 'Apply copon Invalid!');
        }
    }

    // ----------------------------------- Remove Copon 
    public function coponRemove()
    {
        if (Session::has('copon')) {
            Session()->forget('copon');
            return redirect()->route('cartPage')->with('success', 'Copon Remove Success');
        }
    }

    // -------------------------------------- checkout page -------------------------------------
    public function checkOut()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_ip', request()->ip())->latest()->get();
            $categories = Category::where('status', 1)->latest()->get();
            $copons = Copon::all();
            $subtotle = Cart::all()->where('user_ip', request()->ip())->sum(function ($t) {
                return $t->price * $t->qty;
            });
            return view('frontend.checkout', compact('subtotle', 'categories', 'carts', 'copons'));
        } else {
            return redirect()->route('login');
        }
    }
}
