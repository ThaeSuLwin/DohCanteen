<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title>Doh Canteen</title>

<!-- Favicons -->
<link rel="shortcut icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" href="assets/img/favicon_60x60.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon_76x76.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon_120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon_152x152.png">

<!-- Fonts -->
<link href="{{ asset('https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Raleway:wght@100;200;400;500&display=swap')}}" rel="stylesheet">

<!-- CSS Core -->
<link rel="stylesheet" href="{{ asset ('dist/css/core.css')}}" />

<!-- CSS Theme -->
<link id="theme" rel="stylesheet" href="{{ asset ('dist/css/theme-beige.css')}}" />




</head>



<body>

<!-- Body Wrapper -->
<div id="body-wrapper" class="animsition">

    <!-- Header -->
    <header id="header" class="light">



<div class="container">
    <div class="row">

            <!-- Logo -->

            <div class="col-md-3 mt-3">
                    <!-- Logo -->
                    <div class="module module-logo-horizontal">
                        <a href="index.html">
                            <img src="/assets/img/dohlogo.png" alt="" style="width:140px; height:160px;" >
                        </a>
                    </div>
                </div>
                <div class="col-md-7 ">
                    <!-- Navigation -->
                    <nav class="module module-navigation left mr-4">
                        <ul id="nav-main" class="nav nav-main">

                                        <li><a href="{{url('user/landing')}}">Home </a></li>

                            <li>
                                <a href="{{url ('user/canteenInfo')}}">Food Menu</a>

                         </li>
                        <li>
                                <a href="{{ url ('user/booking')}}">Booking</a>
                        </li>
                        {{-- <li class="has-dropdown">
                                <a href="#">More</a>
                                <div class="dropdown-container">
                                <ul class="navbar-nav ml-auto">
                                        <li><a href="page-offer-single.html">Offer single</a></li>
                                        <li><a href="page-product.html">Product</a></li>
                                        <li><a href="{{url('user/booking')}}">Book a table</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="confirmation.html">Confirmation</a></li>
                                        <li><a href="{{ url('user/blog') }}">Blog</a></li>
                                        <li><a href="blog-sidebar.html">Blog + Sidebar</a></li>
                                        <li><a href="blog-post.html">Blog Post</a></li>
                                        <li><a href="documentation/" target="_blank">Documentation</a></li>
                                    </ul>
                                     <div class="dropdown-image">
                                        <img src="http://assets.suelo.pl/soup/img/photos/dropdown-more.jpg" alt="">
                                    </div>
                                </div>
                        </li> --}}
                        @guest
                            <li class="nav-item">
                                <a class="nav-link p-0" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link p-0" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle p-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href=""
                                       onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">

                                        Log Out
                                    </a>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                        <!-- <a href="" class="dropdown-item" >Log Out</a> -->


                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                    </nav>
                </div>

                <div class="module left">
                    <a href="#" class="module module-cart right" data-toggle="panel-cart">
                        <span class="cart-icon">


                            <i class="ti ti-shopping-cart text-yellow"></i>
                            @if(session()->get('addToCart') != null)
                            <span class="badge badge-success"> {{count(session()->get('addToCart'))}}</span>

                            @else
                            <span class="badge badge-info"> 0 </span>
                            @endif
                            {{-- <span class="badge badge-success"></span> --}}
                        </span>
                        {{-- <span class="cart-value">ကျပ်<span class="value">0.00</span></span> --}}
                    </a>
                </div>

            </div>
        </div>

    </header>
    <!-- Header / End -->

    <!-- Header -->
    <header id="header-mobile" class="light">

        <div class="module module-nav-toggle">
            <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
        </div>

        <div class="module module-logo">
            <a href="index.html">
                <img src="assets/img/logo-horizontal-dark.svg" alt="">
            </a>
        </div>
    </header>
    <!-- Header / End -->

   <!-- Right Side Of Navbar -->



    @yield('mastercontent')

  <!-- Content -->
  <div id="panel-cart">
        <div class="panel-cart-container">
            <div class="panel-cart-title" style="background-color:#25282a ;">
                <h5 class="title" style="color: white;">Your Cart</h5>
                <button class="close" data-toggle="panel-cart"><i class="ti ti-close text-white"></i></button>
            </div>

              @if (session()->has('addToCart'))

            <div class="panel-cart-content cart-details">
                @foreach(Session()->get('addToCart') as $addToCartItem)
                    <div class="col-md-12 shadow p-3 mb-3 bg-white rounded"  >
                        <div class="row mb-3 py-2">
                            <div class="col-md-4" >
                                <img src="{{asset('storage/subCategory_images/'.subCategory($addToCartItem->sub_category_id)->image)}}" style=" width: 120px; height: 85px;" alt="" class="rounded float-start">
                            </div>
                            <div class="col-md-8" >
                                <ul style="list-style: none";>
                                    <li>{{subCategory($addToCartItem->sub_category_id)->name}}</li>
                                    <li>
                                        <i class="fa fa-x fa-money pr-2 " aria-hidden="true"></i>
                                        <span style="color:rgb(110, 28, 218); font-weight: bold; margin-right: 28px;">Price:</span>

                                    {{subCategory($addToCartItem->sub_category_id)->price}} MMK</li>
                                    <li><i class="fa fa-x fa-cart-plus pr-2" aria-hidden="true"></i> <span style="color:rgb(110, 28, 218); font-weight: bold;  margin-right: 8px;">Quantity:</span>
                                        {{$addToCartItem->qty}} Qty</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
                @else
                <div class="cart-empty">
                    <i class="ti ti-shopping-cart"></i>
                    <p>Your cart is empty..</p>
                </div>
                @endif

        </div>

        <a href="{{url('/user/check-out')}}" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Go to checkout</span></a>
</div>
 <!-- Panel Mobile -->
 <nav id="panel-mobile">
    <div class="module module-logo bg-dark dark">
        <a href="#">
            <img src="assets/img/logo-light.svg" alt="" width="88">
        </a>
        <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
    </div>
<nav class="module module-navigation"></nav>
    <div class="module module-social">
        <h6 class="text-sm mb-3">Follow Us!</h6>
        <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
        <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
        <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
    </div>
</nav>
@yield('content')
<script src="{{ asset('dist/js/jquery.js') }}"></script>
       <!-- JS Core -->
<script src="{{ asset('dist/js/core.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
@yield('javascript')
</body>

</html>
