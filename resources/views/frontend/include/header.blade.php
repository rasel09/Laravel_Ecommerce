 <!-- Humberger Begin -->
 <div class="humberger__menu__overlay"></div>
 <div class="humberger__menu__wrapper">
     <div class="humberger__menu__logo">
         {{-- <a href="#"><img src="{{asset('website/')}}/img/logo.png" alt=""></a> --}}
     </div>
     <div class="humberger__menu__cart">
         <ul>
             <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
             <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
         </ul>
         <div class="header__cart__price">: <span>$150.00</span></div>
     </div>
     <div class="humberger__menu__widget">
         <div class="header__top__right__language">
             <img src="{{asset('website/')}}/img/language.png" alt="">
             <div>English</div>
             <span class="arrow_carrot-down"></span>
             <ul>
                 <li><a href="#">Spanis</a></li>
                 <li><a href="#">English</a></li>
             </ul>
         </div>
         <div class="header__top__right__auth">
             <a href="#"><i class="fa fa-user"></i> Login</a>
         </div>
       
     </div>
     <nav class="humberger__menu__nav mobile-menu">
         <ul>
             <li class="active"><a href="{{route('home')}}">Home</a></li>
             <li><a href="./shop-grid.html">Shop</a></li>
             <li><a href="#">Pages</a>
                 <ul class="header__menu__dropdown">
                     <li><a href="./shop-details.html">Shop Details</a></li>
                     <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                     <li><a href="./checkout.html">Check Out</a></li>
                     <li><a href="./blog-details.html">Blog Details</a></li>
                 </ul>
             </li>
             <li><a href="./blog.html">Blog</a></li>
             <li><a href="./contact.html">Contact</a></li>
         </ul>
     </nav>
     <div id="mobile-menu-wrap"></div>
     <div class="header__top__right__social">
         <a href="#"><i class="fa fa-facebook"></i></a>
         <a href="#"><i class="fa fa-twitter"></i></a>
         <a href="#"><i class="fa fa-linkedin"></i></a>
         <a href="#"><i class="fa fa-pinterest-p"></i></a>
     </div>
     <div class="humberger__menu__contact">
         <ul>
             <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
             <li>Free Shipping for all Order of $99</li>
         </ul>
     </div>
 </div>
 <!-- Humberger End -->

 <!-- Header Section Begin -->
 <header class="header">
     <div class="header__top">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6 col-md-6">
                     <div class="header__top__left">
                         <ul>
                             <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                             <li>Free Shipping for all Order of $99</li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-6 col-md-6">
                     <div class="header__top__right">
                         <div class="header__top__right__social">
                             <a href="#"><i class="fa fa-facebook"></i></a>
                             <a href="#"><i class="fa fa-twitter"></i></a>
                             <a href="#"><i class="fa fa-linkedin"></i></a>
                             <a href="#"><i class="fa fa-pinterest-p"></i></a>
                         </div>
                         <div class="header__top__right__language">
                             <img src="{{asset('website/')}}/img/language.png" alt="">
                             <div>English</div>
                             <span class="arrow_carrot-down"></span>
                             <ul>
                                 <li><a href="#">Spanis</a></li>
                                 <li><a href="#">English</a></li>
                             </ul>
                         </div>
                         <div class="header__top__right__auth">
                             <a href="{{route('register')}}"><i class="fa fa-user"></i> Register</a>
                             
                             <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                              Logout  
                  </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     {{-- show message on product--}}
     <div class="container mt-3">
        @if (Session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>{{Session('success')}}</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       
        @endif
     </div>
    </div>
     <div class="container">
         <div class="row">
             <div class="col-lg-3">
                 <div class="header__logo">
                     <a href="{{route('home')}}"><img src="{{asset('website/')}}/img/online-shop.png" alt="" style="width: 80px;"></a>
                 </div>
             </div>
             <div class="col-lg-6">
                 <nav class="header__menu">
                     <ul>
                         <li class="active"><a href="{{route('home')}}">Home</a></li>
                         <li><a href="./shop-grid.html">Shop</a></li>
                         <li><a href="#">Pages</a>
                             <ul class="header__menu__dropdown">
                                 <li><a href="./shop-details.html">Shop Details</a></li>
                                 <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                 <li><a href="./checkout.html">Check Out</a></li>
                                 <li><a href="./blog-details.html">Blog Details</a></li>
                             </ul>
                         </li>
                         <li><a href="./blog.html">Blog</a></li>
                         <li><a href="./contact.html">Contact</a></li>
                     </ul>
                 </nav>
             </div>
             <div class="col-lg-3">
                 <div class="header__cart">
                     @php
                         $totle=App\Models\Cart::all()->where('user_ip',request()->ip())->sum(function($t){
                             return $t->price * $t->qty;
                         });
                        $quantity=App\Models\Cart::where('user_ip',request()->ip())->sum('qty');
                     @endphp
                     <ul>
                         <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                         <li><a href="{{route('cartPage')}}"><i class="fa fa-shopping-bag"></i> <span>{{$quantity}}</span></a></li>
                     </ul>
                     <div class="header__cart__price">item: <span>${{$totle}}</span></div>
                 </div>
             </div>
         </div>
         <div class="humberger__open">
             <i class="fa fa-bars"></i>
         </div>
     </div>
 </header>
 <!-- Header Section End -->
