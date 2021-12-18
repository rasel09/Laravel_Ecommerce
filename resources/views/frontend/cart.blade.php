@extends('frontend.master')
@section('content')
 <!-- Shoping Cart Section Begin -->
 <section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $carts  as $cart)
                                
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{asset($cart->product->image)}}" alt="" style="width: 80px;">
                                    <h5>{{$cart->product->product_name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ${{$cart->price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                   <form action="{{route('cart.update',$cart->id)}}" method="POST">
                                       @csrf
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="{{$cart->qty}}" min="1" name="qty">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    </div>
                                   </form>
                                </td>
                                <td class="shoping__cart__total">
                                    ${{$cart->price * $cart->qty}}
                                </td>
                                <td class="shoping__cart__item__close">
                                  <a href="{{route('cart.destroy',$cart->id)}}"><span class="icon_close"></span></a>  
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{route('home')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                   
                </div>
            </div>
    
            <div class="col-lg-6">
                @if (Session::has('copon'))
               @else
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="{{route('apply.copon')}}" method="POST">
                            @csrf
                            <input type="text" name="copon_name" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        @if (Session::has('copon'))
                        <li>Subtotal <span>${{$subtotle}}</span></li>
                        <li>Copon <span>{{Session()->get('copon')['copon_name']}}<a href="{{route('remove.copon')}}"><i class="fa fa-times btn btn-success btn-sm ml-2"></i></a></span></li>
                        <li>Discount<span>${{Session()->get('copon')['discoute']}}({{
                            $discoute=$subtotle * Session()->get('copon')['discoute']/100
                        }}$)</span></li>
                        <li>Total <span>${{$subtotle-$discoute}}</span></li>
                        @else
                        <li>Totle<span>${{$subtotle}}</span></li>
                        @endif
                    </ul>
                    <a href="{{route('checkout.index')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
 @endsection
