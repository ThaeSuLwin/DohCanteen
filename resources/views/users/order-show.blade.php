@extends('users.layouts.master')
@section('mastercontent')


<style>

.text{
    margin-bottom: 2px;
    margin-top : 3px;
   color: #40c5acf2;
   font-size:16px;
}

    </style>

<div class="container">

   <!-- Section -->
   <section class="section bg-light">

<div class="container">
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="cart-details shadow bg-white stick-to-content mb-4">
                <div class="bg-dark dark p-4"><h5 class="mb-0">You order</h5></div>
                <table class="cart-table">
                    <tr>
                        <td class="title">
                            <span class="name"><a href="#product-modal" data-toggle="modal">Pizza Chicked BBQ</a></span>
                            <span class="caption text-muted">26”, deep-pan, thin-crust</span>
                        </td>
                        <td class="price">$9.82</td>
                        <td class="actions">
                            <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="title">
                            <span class="name"><a href="#product-modal" data-toggle="modal">Beef Burger</a></span>
                            <span class="caption text-muted">Large (500g)</span>
                        </td>
                        <td class="price">$9.82</td>
                        <td class="actions">
                            <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="title">
                            <span class="name"><a href="#product-modal" data-toggle="modal">Extra Burger</a></span>
                            <span class="caption text-muted">Small (200g)</span>
                        </td>
                        <td class="price text-success">$0.00</td>
                        <td class="actions">
                            <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="title">
                            <span class="name">Weekend 20% OFF</span>
                        </td>
                        <td class="price text-success">-$8.22</td>
                        <td class="actions"></td>
                    </tr>
                </table>
                <div class="cart-summary">
                    <div class="row">
                        <div class="col-7 text-right text-muted">Order total:</div>
                        <div class="col-5"><strong>$<span class="cart-products-total">0.00</span></strong></div>
                    </div>
                    <div class="row">
                        <div class="col-7 text-right text-muted">Devliery:</div>
                        <div class="col-5"><strong>$<span class="cart-delivery">0.00</span></strong></div>
                    </div>
                    <hr class="hr-sm">
                    <div class="row text-lg">
                        <div class="col-7 text-right text-muted">Total:</div>
                        <div class="col-5"><strong>$<span class="cart-total">0.00</span></strong></div>
                    </div>
                </div>
                <div class="cart-empty">
                    <i class="ti ti-shopping-cart"></i>
                    <p>Your cart is empty...</p>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7 order-lg-first">
            <div class="bg-white p-4 p-md-5 mb-4">
            
        <h3 style="text-align: center;">Your Order Details:</h3>
           @foreach($orders as $order)
                <div class="row">
                
                 <div class="col-md-3 ">
                 <img class="mb-4"
                src="{{asset('storage/subCategory_images/'.$order->subCategory->image)}}"
                 alt="image" style="height:100px">
                </div>
               
                <div class="col-md-6">
                <p style="font-weight: bold; font-size:20px; margin-bottom: 3px;"> {{$order->subCategory->name}} (Quantity: {{$order->quantity}}) </p>
                <p class="text"> Ingredients </p> 
                @foreach($order->subCategory->options as $option)
                 {{$option->name}} <span>,</span>
                @endforeach
                <p class="text">  Addition </p> 
                @foreach($order->subCategory->additions as $addition)
                    {{$addition->name}} <span>,</span>
                @endforeach
                <p class="text">Other</p>
                <p>{{$order->other}}</p>
               
                
                </div>
                <div class="col-md-2">
                {{$order->subCategory->price}}MMK
                </div>
                </div>
                @endforeach
                <h4 class="border-bottom pb-4"><i class="ti ti-package mr-3 text-primary"></i>Delivery</h4>
                <div class="row mb-5">
                    <div class="form-group col-sm-6">
                        <label>Delivery time:</label>
                        <div class="select-container">
                            <select class="form-control">
                                <option>As fast as possible</option>
                                <option>In one hour</option>
                                <option>In two hours</option>
                            </select>
                        </div>
                    </div>
                </div>

                <h4 class="border-bottom pb-4"><i class="ti ti-wallet mr-3 text-primary"></i>Payment</h4>
                <div class="row text-lg">
                    <div class="col-md-4 col-sm-6 form-group">
                        <label class="custom-control custom-radio">
                            <input type="radio" name="payment_type" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">PayPal</span>
                        </label>
                    </div>
                    <div class="col-md-4 col-sm-6 form-group">
                        <label class="custom-control custom-radio">
                            <input type="radio" name="payment_type" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Credit Card</span>
                        </label>
                    </div>
                    <div class="col-md-4 col-sm-6 form-group">
                        <label class="custom-control custom-radio">
                            <input type="radio" name="payment_type" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Cash</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary btn-lg"><span>Order now!</span></button>
            </div>
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
<div id="panel-cart">
<div class="panel-cart-container">
<div class="panel-cart-title">
    <h5 class="title">Your Cart</h5>
    <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
</div>
<div class="panel-cart-content cart-details">
    <table class="cart-table">
        <tr>
            <td class="title">
                <span class="name"><a href="#product-modal" data-toggle="modal">Beef Burger</a></span>
                <span class="caption text-muted">Large (500g)</span>
            </td>
            <td class="price">$9.00</td>
            <td class="actions">
                <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
            </td>
        </tr>
        <tr>
            <td class="title">
                <span class="name"><a href="#product-modal" data-toggle="modal">Extra Burger</a></span>
                <span class="caption text-muted">Small (200g)</span>
            </td>
            <td class="price text-success">$9.00</td>
            <td class="actions">
                <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
            </td>
        </tr>
    </table>
    <div class="cart-summary">
        <div class="row">
            <div class="col-7 text-right text-muted">Order total:</div>
            <div class="col-5"><strong>$<span class="cart-products-total">0.00</span></strong></div>
        </div>
        <div class="row">
            <div class="col-7 text-right text-muted">Devliery:</div>
            <div class="col-5"><strong>$<span class="cart-delivery">0.00</span></strong></div>
        </div>
        <hr class="hr-sm">
        <div class="row text-lg">
            <div class="col-7 text-right text-muted">Total:</div>
            <div class="col-5"><strong>$<span class="cart-total">0.00</span></strong></div>
        </div>
    </div>
    <div class="cart-empty">
        <i class="ti ti-shopping-cart"></i>
        <p>Your cart is empty...</p>
    </div>
</div>
</div>
<a href="checkout.html" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Go to checkout</span></a>
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

<!-- Body Overlay -->
<div id="body-overlay"></div>

</div>

<!-- Modal / Product -->
<div class="modal fade product-modal" id="product-modal" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header modal-header-lg dark bg-dark">
    <div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/modal-add.jpg" alt=""></div>
    <h4 class="modal-title">Specify your dish</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti ti-close"></i></button>
</div>
<div class="modal-product-details">
    <div class="row align-items-center">
        <div class="col-9">
            <h6 class="mb-1 product-modal-name">Boscaiola Pasta</h6>
            <span class="text-muted product-modal-ingredients">Pasta, Cheese, Tomatoes, Olives</span>
        </div>
        <div class="col-3 text-lg text-right">$<span class="product-modal-price"></span></div>
    </div>
</div>
<div class="modal-body panel-details-container">
    <!-- Panel Details / Size -->
    <div class="panel-details panel-details-size">
        <h5 class="panel-details-title">
            <label class="custom-control custom-radio">
                <input name="radio_title_size" type="radio" class="custom-control-input">
                <span class="custom-control-indicator"></span>
            </label>
            <a href="#panel-details-sizes-list" data-toggle="collapse">Size</a>
        </h5>
        <div id="panel-details-sizes-list" class="collapse show">
            <div class="panel-details-content">
                <div class="product-modal-sizes">
                    <div class="form-group">
                        <label class="custom-control custom-radio">
                            <input name="radio_size" type="radio" class="custom-control-input" checked>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Small - 100g ($9.99)</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-radio">
                            <input name="radio_size" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Medium - 200g ($14.99)</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-radio">
                            <input name="radio_size" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Large - 350g ($21.99)</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Panel Details / Additions -->
    <div class="panel-details panel-details-additions">
        <h5 class="panel-details-title">
            <label class="custom-control custom-radio">
                <input name="radio_title_additions" type="radio" class="custom-control-input">
                <span class="custom-control-indicator"></span>
            </label>
            <a href="#panel-details-additions-content" data-toggle="collapse">Additions</a>
        </h5>
        <div id="panel-details-additions-content" class="collapse">
            <div class="panel-details-content">
                <!-- Additions List -->
                <div class="row product-modal-additions">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Tomato ($1.29)</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Ham ($1.29)</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Chicken ($1.29)</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Cheese($1.29)</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Bacon ($1.29)</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Panel Details / Other -->
    <div class="panel-details panel-details-form">
        <h5 class="panel-details-title">
            <label class="custom-control custom-radio">
                <input name="radio_title_other" type="radio" class="custom-control-input">
                <span class="custom-control-indicator"></span>
            </label>
            <a href="#panel-details-other" data-toggle="collapse">Other</a>
        </h5>
        <div id="panel-details-other" class="collapse">
            <form action="#">
                <textarea cols="30" rows="4" class="form-control" placeholder="Put this any other informations..."></textarea>
            </form>
        </div>
    </div>
</div>
<button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" data-action="add-to-cart"><span>Add to Cart</span></button>
<button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" data-action="update-cart"><span>Update</span></button>
</div>
</div>
</div>

<!-- Cookies Bar -->
<div id="cookies-bar" class="body-bar cookies-bar">
<div class="body-bar-container container">
<div class="body-bar-text">
<h4 class="mb-2">Cookies & GDPR</h4>
<p>This is a sample Cookies / GDPR information. You can use it easily on your site and even add link to <a href="#">Privacy Policy</a>.</p>
</div>
<div class="body-bar-action">
<button class="btn btn-primary" data-accept="cookies"><span>Accept</span></button>
</div>
</div>
</div>



@endsection