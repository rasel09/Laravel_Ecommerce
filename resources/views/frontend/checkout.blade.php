@extends('frontend.master')
@section('content')
 <!-- Checkout Section Begin -->
 <section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Shipping Address</h4>
            <form action="{{route('store.order')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Name<span>*</span></p>
                                    <input type="text" name="name" placeholder="Enter Your Name"  value="{{Auth::user()->name}}">
                                    @error('name')
                                        <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phone" placeholder="Phone Number">
                                    @error('phone')
                                    <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" name="email" placeholder="Email" value="{{Auth::user()->email}}">
                                    @error('email')
                                    <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Address" class="checkout__input__add" name="address">
                            @error('address')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                        </div>
                       
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input type="text" name="state" placeholder="State">
                            @error('state')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" name="post_code" placeholder="Post_code">
                            @error('post_code')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                        </div>
                        </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                @foreach ($carts as $cart)
                                    
                                <li>{{$cart->product->product_name}} ({{$cart->qty}}) <span>${{$cart->price * $cart->qty}}</span></li>
                                @endforeach
                            </ul>
                            @if (Session::has('copon')) 
                            <div class="checkout__order__subtotal">Copon <span>{{Session()->get('copon')['copon_name']}}</span></div>
                            <div class="checkout__order__subtotal">SubTotle<span>${{Session()->get('copon')['discoute']}} ({{
                                $discoute=$subtotle * Session()->get('copon')['discoute']/100
                            }}$)</span></div>
                            <div class="checkout__order__subtotal">Totle <span>${{$subtotle- $discoute}}</span></div>
                            
                            <input type="hidden" name="discoute" value="{{Session()->get('copon')['copon_name']}}">

                            <input type="hidden" name="subtotle" value="{{Session()->get('copon')['discoute']}} ({{
                                $discoute=$subtotle * Session()->get('copon')['discoute']/100
                            }})">
                            <input type="hidden" name="totle" value="{{$subtotle- $discoute}}">
                           @else
                            <div class="checkout__order__subtotal">Totle<span>{{$subtotle}}</span></div>
                            <input type="hidden" name="totle" value="{{$subtotle}}">
                            @endif
                           <h5 class="mb-3">Select Payment Methoe</h5>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                     HandCash
                                    <input type="checkbox" id="payment" value="handcash" name="payment_type">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal" value="paypal" name="payment_type">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection
