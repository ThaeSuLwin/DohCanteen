@extends('users.layouts.master')

@section('mastercontent')

<div id="content">
<!-- Section - Main -->
    <section class="section section-main section-main-2 bg-dark dark">

   <div id="section-main-2-slider" class="section-slider inner-controls">
       <!-- Slide -->
       <div class="slide">
           <div class="bg-image zooming"><img src="{{ asset('/assets/img/order1.png')}}" alt=""></div>
           <div class="container v-center">
               <h1 class="display-2 mb-2">Get 10% off coupon</h1>
               <h4 class="text-muted mb-5">and use it with your next order!</h4>
               <a href="page-offers.html" class="btn btn-outline-primary btn-lg"><span>Get it now!</span></a>
           </div>
       </div>

       <!-- Slide -->
       <div class="slide">
           <div class="bg-image zooming"><img src="{{ asset('/assets/img/order.jpeg')}}" alt=""></div>
           <div class="container v-center">
               <h1 class="display-2 mb-2">Delicious Desserts</h1>
               <h4 class="text-muted mb-5">Order it online even now!</h4>
               <a href="menu-list-collapse.html" class="btn btn-outline-primary btn-lg"><span>Order now!</span></a>
           </div>
       </div>
       <!-- Slide -->
       <div class="slide">
           <div class="bg-image zooming"><img src="/assets/img/order3.jpg" alt=""></div>
           <div class="container v-center">
               <h4 class="text-muted">New product!</h4>
               <h1 class="display-2">Mala Xiang Guo</h1>
               <div class="btn-group">
                   <button class="btn btn-outline-primary btn-lg" data-action="open-cart-modal" data-id="1"><span>Add to order</span></button>
                   <span class="price price-lg">from MMK5000</span>
               </div>
           </div>
       </div>
   </div>

</section>



    <!-- Section - About -->
<section class="section right">

<div class="container">
    <h1 class="mb-6">Highly Recommended Canteens !!</h1>
    <div class="row">
        <div class="col-md-4">
            <!-- Card -->
            <div class="card">
                <div class="card-image">
                    <img src="http://assets.suelo.pl/soup/img/products/product-burger.jpg" alt="">
                </div>
                <div class="card-body">
                    <h5 class="mb-1">Green House</h5>
                    <span class="text-muted text-sm">ဆိုင်၏၀န်ဆောင်မှုသည် နွေထွေးပျူငှာမှုရှိပြီး ကျောင်းသူအများစုထိုင်လေ့ရှိသည်။</span>

                    <div class="row align-items-center mt-4">
                        <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-primary btn-sm" ><span> <a href="menu-grid-collapse.html">Go to Menu</a></span></button></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Card -->
            <div class="card">
                <div class="card-image">
                    <img src="http://assets.suelo.pl/soup/img/products/product-pizza.jpg" alt="">
                </div>
                <div class="card-body">
                    <h5 class="mb-1">Inifinity</h5>
                    <span class="text-muted text-sm">Update အစားအသောက်များရနိုင်ပြီး ကျောင်း၏အသင်းအဖွဲ့အများစုထိုင်လေ့ရှိသည်</span>
                    <div class="row align-items-center mt-4">

                        <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-primary btn-sm" data-action="open-cart-modal" data-id="2"><span>Go to Menu</span></button></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Card -->
            <div class="card">
                <div class="card-image">
                    <img src="http://assets.suelo.pl/soup/img/products/product-chicken-burger.jpg" alt="">
                </div>
                <div class="card-body">
                    <h5 class="mb-1">တက်လူ</h5>
                    <span class="text-muted text-sm">ဆိုင်အပြင်အဆင်က အေးချမ်းမှုရှိပြီး  အစားအသောက်များ စျေးနူန်းသက်သာသည်</span>
                    <div class="row align-items-center mt-4">

                        <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-primary btn-sm" data-action="open-cart-modal" data-id="2"><span>Go to Menu</span></button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-5">
        <a href="menu-grid-collapse.html" class="btn btn-primary"><span>View Our Menu</span></a>
    </div>
</div>

</section>



<div class="menu-sample-carousel carousel inner-controls" data-slick='{
    "dots": true,
    "slidesToShow": 3,
    "slidesToScroll": 1,
    "infinite": true,
    "responsive": [
        {
            "breakpoint": 991,
            "settings": {
                "slidesToShow": 2,
                "slidesToScroll": 1
            }
        },
        {
            "breakpoint": 690,
            "settings": {
                "slidesToShow": 1,
                "slidesToScroll": 1
            }
        }
    ]
}'>
    <!-- Menu Sample -->
    <div class="menu-sample">
        <a href="menu-list-navigation.html#Burgers">
            <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-burgers.jpg" alt="" class="image">
            <h3 class="title">Burgers</h3>
        </a>
    </div>
    <!-- Menu Sample -->
    <div class="menu-sample">
        <a href="menu-list-navigation.html#Pizza">
            <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-pizza.jpg" alt="" class="image">
            <h3 class="title">Pizza</h3>
        </a>
    </div>
    <!-- Menu Sample -->
    <div class="menu-sample">
        <a href="menu-list-navigation.html#Sushi">
            <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-sushi.jpg" alt="" class="image">
            <h3 class="title">Sushi</h3>
        </a>
    </div>
    <!-- Menu Sample -->
    <div class="menu-sample">
        <a href="menu-list-navigation.html#Pasta">
            <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-pasta.jpg" alt="" class="image">
            <h3 class="title">Pasta</h3>
        </a>
    </div>
    <!-- Menu Sample -->
    <div class="menu-sample">
        <a href="menu-list-navigation.html#Desserts">
            <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-dessert.jpg" alt="" class="image">
            <h3 class="title">Desserts</h3>
        </a>
    </div>
    <!-- Menu Sample -->
    <div class="menu-sample">
        <a href="menu-list-navigation.html#Drinks">
            <img src="http://assets.suelo.pl/soup/img/photos/menu-sample-drinks.jpg" alt="" class="image">
            <h3 class="title">Drinks</h3>
        </a>
    </div>
</div>

</section>

<!-- Section - Offers -->
<section class="section bg-light">

<div class="container">
    <h1 class="text-center mb-6">Special offers</h1>
    <div class="carousel" data-slick='{"dots": true}'>
        <!-- Special Offer -->
        <div class="special-offer">
            <img src="http://assets.suelo.pl/soup/img/photos/special-burger.jpg" alt="" class="special-offer-image">
            <div class="special-offer-content">
                <h2 class="mb-2">Free Burger</h2>
                <h5 class="text-muted mb-5">Get free burger from orders higher that $40!</h5>
                <ul class="list-check text-lg mb-0">
                    <li>Only on Tuesdays</li>
                    <li class="false">Order higher that $40</li>
                    <li>Unless one burger ordered</li>
                </ul>
            </div>
        </div>
        <!-- Special Offer -->
        <div class="special-offer">
            <img src="http://assets.suelo.pl/soup/img/photos/special-pizza.jpg" alt="" class="special-offer-image">
            <div class="special-offer-content">
                <h2 class="mb-2">Free Small Pizza</h2>
                <h5 class="text-muted mb-5">Get free burger from orders higher that $40!</h5>
                <ul class="list-check text-lg mb-0">
                    <li>Only on Weekends</li>
                    <li class="false">Order higher that $40</li>
                </ul>
            </div>
        </div>
        <!-- Special Offer -->
        <div class="special-offer">
            <img src="http://assets.suelo.pl/soup/img/photos/special-dish.jpg" alt="" class="special-offer-image">
            <div class="special-offer-content">
                <h2 class="mb-2">Chip Friday</h2>
                <h5 class="text-muted mb-5">10% Off for all dishes!</h5>
                <ul class="list-check text-lg mb-0">
                    <li>Only on Friday</li>
                    <li>All products</li>
                    <li>Online order</li>
                </ul>
            </div>
        </div>
    </div>
</div>

</section>

<!-- Section -->
<section class="section section-lg dark bg-dark">

<!-- BG Image -->
<div class="bg-image bg-parallax"><img src="http://assets.suelo.pl/soup/img/photos/bg-croissant.jpg" alt=""></div>

<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="mb-3">Check our promo video!</h2>
            <h5 class="text-muted">Book a table even right now or make an online order!</h5>
            <button class="btn-play" data-toggle="video-modal" data-target="#modalVideo" data-video="https://www.youtube.com/embed/uVju5--RqtY"></button>
        </div>
    </div>
</div>

</section>

<!-- Footer -->
<footer id="footer" class="bg-dark dark">

<div class="container">
    <!-- Footer 1st Row -->
    <div class="footer-first-row row">
        <div class="col-lg-3 text-center">
            <a href="index.html"><img src="assets/img/logo-light.svg" alt="" width="88" class="mt-5 mb-5"></a>
        </div>
        <div class="col-lg-4 col-md-6">
            <h5 class="text-muted">Latest news</h5>
            <ul class="list-posts">
                <li>
                    <a href="blog-post.html" class="title">How to create effective webdeisign?</a>
                    <span class="date">February 14, 2015</span>
                </li>
                <li>
                    <a href="blog-post.html" class="title">Awesome weekend in Polish mountains!</a>
                    <span class="date">February 14, 2015</span>
                </li>
                <li>
                    <a href="blog-post.html" class="title">How to create effective webdeisign?</a>
                    <span class="date">February 14, 2015</span>
                </li>
            </ul>
        </div>
        <div class="col-lg-5 col-md-6">
            <h5 class="text-muted">Subscribe Us!</h5>
            <!-- MailChimp Form -->
            <form action="//suelo.us12.list-manage.com/subscribe/post-json?u=ed47dbfe167d906f2bc46a01b&amp;id=24ac8a22ad" id="sign-up-form" class="sign-up-form validate-form mb-5" method="POST">
                <div class="input-group">
                    <input name="EMAIL" id="mce-EMAIL" type="email" class="form-control" placeholder="Tap your e-mail..." required>
                    <span class="input-group-btn">
                        <button class="btn btn-primary btn-submit" type="submit">
                            <span class="description">Subscribe</span>
                            <span class="success">
                                <svg x="0px" y="0px" viewBox="0 0 32 32"><path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/></svg>
                            </span>
                            <span class="error">Try again...</span>
                        </button>
                    </span>
                </div>
            </form>
            <h5 class="text-muted mb-3">Social Media</h5>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <!-- Footer 2nd Row -->
    <div class="footer-second-row">
        <span class="text-muted">Copyright Soup 2020©. Made with love by Suelo.</span>
    </div>
</div>

<!-- Back To Top -->
<button id="back-to-top" class="back-to-top"><i class="ti ti-angle-up"></i></button>

</footer>
<!-- Footer / End -->

</div>
<!-- Content / End -->

<!-- Panel Cart -->


<!-- Body Overlay -->
<div id="body-overlay"></div>

</div>

<!-- Modal / Product -->

<!-- Video Modal / Demo -->
<div class="modal modal-video fade" id="modalVideo" role="dialog">
<button class="close" data-dismiss="modal"><i class="ti ti-close"></i></button>
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<iframe height="500"></iframe>
</div>
</div>
</div>

<!-- Modal / COVID -->
{{--<div class="modal fade" id="covid-modal" role="dialog" data-timeout="1000" data-set-cookie="covid-modal">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header modal-header-lg dark bg-dark">
    <div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/modal-covid.jpg" alt=""></div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti ti-close"></i></button>
</div>
<div class="modal-body">
    <h3>We are COVID-19 safe!</h3>
    <p>In sed massa tempus, dapibus est pulvinar, pellentesque tellus. Donec ultricies magna nec mauris ornare venenatis. Duis fermentum est diam, in molestie tellus venenatis id. In ut efficitur mi, vel hendrerit libero. Phasellus ac vulputate lorem, pharetra tempor leo. Fusce eu dui libero.</p>
    <button class="btn btn-secondary" data-dismiss="modal"><span>Ok, thanks!</span></button>
</div>
</div>
</div>
</div>--}}

<!-- Cookies Bar -->
{{--<div id="cookies-bar" class="body-bar cookies-bar">
<div class="body-bar-container container">
<div class="body-bar-text">
<h4 class="mb-2">Cookies & GDPR</h4>
<p>This is a sample Cookies / GDPR information. You can use it easily on your site and even add link to <a href="#">Privacy Policy</a>.</p>
</div>
<div class="body-bar-action">
<button class="btn btn-primary" data-accept="cookies"><span>Accept</span></button>
</div>
</div>
</div>--}}


@endsection
