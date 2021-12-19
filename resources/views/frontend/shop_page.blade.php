@extends('frontend.master')
@section('content')
 <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
             
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    @foreach (   $latestProduct  as $row)
                                        
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset($row->image)}}" alt="" style="width: 90px;">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$row->product_name}}</h6>
                                                <span>${{$row->price}}</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset($row->image)}}" alt="" style="width: 90px;">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$row->product_name}}</h6>
                                                <span>${{$row->price}}</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset($row->image)}}" alt="" style="width: 90px;">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$row->product_name}}</h6>
                                                <span>${{$row->price}}</span>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach ($products as $product)
                            
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{asset($product->image)}}">
                                            <div class="product__discount__percent">-20%</div>
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
                                        <div class="product__discount__item__text">
                                            <span>{{$product->product_code}}</span>
                                            <h5><a href="#">{{$product->product_name}}</a></h5>
                                            <div class="product__item__price">${{$product->price}} <span></span></div>
                                           
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                 
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">   
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
                                    <h6><a href="#">{{$product->product_name}}</a></h6>
                                    <h5>${{$product->price}}</h5>
                                    <a href="{{url('/product/detalis/' .$product->id)}}" class="btn btn-primary btn-sm mt-2">View Detels</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                
                        {{$products->links('vendor.pagination.bootstrap-4')}}
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

@endsection
