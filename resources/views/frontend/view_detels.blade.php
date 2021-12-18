@extends('frontend.master')
@section('content')
 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Vegetable’s Package</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <a href="./index.html">Vegetables</a>
                        <span>Vegetable’s Package</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="{{asset($products->image)}}" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="{{asset($products->image)}}"
                            src="{{asset($products->image)}}" alt="">
                        <img data-imgbigurl="{{asset($products->image)}}"
                            src="{{asset($products->image)}}" alt="">
                        <img data-imgbigurl="{{asset($products->image)}}"
                            src="{{asset($products->image)}}" alt="">
                        <img data-imgbigurl="{{asset($products->image)}}"
                            src="{{asset($products->image)}}" alt="">
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$products->product_name}}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price">${{$products->price}}</div>
                    <p>{!! $products->short_description !!}</p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                        {{-- @foreach ($carts   as $cart)
                        <form action="{{route('cart.update',$cart->id)}}" method="POST">
                            @csrf
                         <div class="quantity">
                             <div class="pro-qty">
                                 <input type="text" value="{{$cart->qty}}" min="1" name="qty">
                             </div>
                             <button type="submit" class="btn btn-primary btn-sm">Update</button>
                         </div>
                        </form>
                        @endforeach --}}
                    </div>
                    <form class="d-inline" action="{{route('show.cart',$products->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="price" value="{{$products->price}}">
                        <button type="submit" class="btn btn-primary">Add To Cart</button>
                    </form>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Availability</b> <span>In Stock</span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Weight</b> <span>0.5 kg</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
       
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                aria-selected="false">Reviews <span>(1)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>{!!$products->long_description!!}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>{!!$products->long_description!!}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>{!!$products->long_description!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($releted_product as $product)
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{asset($product->image)}}">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <form class="d-inline" action="{{route('show.cart',$product->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="price" value="{{$product->price}}">
                                <li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li>
                            </form>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$product->product_name}}</h6>
                        <h5>${{$product->price}}</h5>
                        <a href="{{url('/product/detalis/' .$product->id)}}" class="btn btn-primary btn-sm mt-2">View Detels</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Product Section End -->

@endsection
