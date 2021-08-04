@extends('users.layouts.master')

@section('mastercontent')


<div id="content">

<!-- Page Title -->
<div class="page-title bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-4">
                <h1 class="mb-0">Menu Grid</h1>
                <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
            </div>
        </div>
    </div>
</div>
<!-- Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-3">
                <!-- Menu Navigation -->
                <nav id="menu-navigation" class="stick-to-content">
                    <ul class="catnav nav nav-menu bg-dark dark">

                        @foreach($categories as $category)
                        <li><a class="test"
                                href="{{url('user/canteenInfo/'.$canteenInfo->id.'/category/'.$category->id)}}">{{$category->name}}</a>
                        </li>
                        @endforeach

                    </ul>
                </nav>
            </div>
            <div class="col-md-9">
                <!-- Menu Category / Burgers -->
                <div id="Burgers" class="menu-category">
                    <div class="menu-category-title">
                        <div class="bg-image"><img src="/assets/menu1.jpg" alt=""></div>
                        <h2 class="title">
                          All Menu </h2>
                      
                    </div>

                    <div class="menu-category-content padded">
                        <div class="row gutters-sm">
                            @foreach($subCategories as $subCategory)
                            <div class="col-lg-4 col-6">
                                <!-- Menu Item -->

                                <div class="menu-item menu-grid-item">

                                    <img class="mb-4"
                                        src="{{asset('storage/subCategory_images/'.$subCategory->image)}}"
                                        alt="image" style="height:200px">
                                    <h6 class="mb-0">{{$subCategory->name}}</h6>
                                    @foreach($subCategory->options as $option)
                                    <span class="text-muted text-sm">
                                        {{$option->name}} ,
                                    </span>
                                    @endforeach
                                    <div class="row align-items-center mt-4">
                                        <div class="col-sm-6">{{$subCategory->price}}MMK</span></span></div>
                                        <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button
                                                class="show_sub_category_btn btn btn-outline-secondary btn-sm"
                                                data-sub_category_id="{{$subCategory->id}}" data-toggle="modal"
                                                data-target="#product-modal"><span>Add to cart</span></button></div>
                                    </div>

                                </div>

                            </div>

                            @endforeach

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
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
        <span class="text-muted">Copyright Soup 2017©. Made with love by Suelo.</span>
    </div>
</div>

<!-- Back To Top -->
<button id="back-to-top" class="back-to-top"><i class="ti ti-angle-up"></i></button>

</footer>
<!-- Footer / End -->
</div>
<!---content/End -->

 <!-- Modal / Product -->
 <div class="modal fade product-modal" id="product-modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-lg dark bg-dark">
                    <div class="bg-image"><img src="http://assets.suelo.pl/soup/img/photos/modal-add.jpg" alt=""></div>
                    <h4 class="modal-title">Specify your dish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti ti-close"></i></button>
                </div>
                <form action="{{url('admin/add-to-cart')}}" method="POST">
                @csrf

                <div class="modal-product-details">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h6 class="mb-1 product-modal-name" id="sub_category_name"></h6>
                            <input type="hidden" value="" name="sub_category_id" id="sub_category_id">
                        </div>
                        <div class="col-3 text-lg text-right"><span class="product-modal-price" id="sub_category_price"></span>MMK</div>
                    </div>
                </div>
                <div class="modal-body panel-details-container">
                  
                    <!-- Panel Details / Size -->
                    <div class="panel-details panel-details-size">
                        <h5 class="panel-details-title">
                            <label class="custom-control custom-radio" style="margin-right: 5px;">
                                    <input name="" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator cart"></span>
                                </label> Ingredients
                        </h5>
                        <div>
                            <ul style=" column-count: 2;
                                column-gap: 2rem;
                                list-style: none;">
                                <li id="option_div"></li>
                            </ul>


                        </div>

                    </div>
                    <!-- Panel Details / Additions -->
                    <div class="panel-details panel-details-additions">
                        <h5 class="panel-details-title">
                            <label class="custom-control custom-radio">
                                <input name="radio_title_additions" type="radio" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                            </label>
                            <a href="#panel-details-additions-content" data-toggle="collapse">
                            <label for="" id="addition">Additions</label>
                            </a>
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
                                                <span class="custom-control-description"></span>
                                                <ul style=" column-count: 2;column-gap: 2rem;list-style: none;">
                                <li id="addition_div" data-status="hidden"></li>
                            </ul>
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
               
                                <textarea name="other" cols="30" rows="4" class="form-control" placeholder="Put this any other informations..."></textarea>
                            
                        </div>
                    </div>
                </div>
                <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" data-action="add-to-cart"><span>Add to Cart</span></button>
                <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" data-action="update-cart"><span>Update</span></button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset('dist/js/core.js') }}"></script>
<script>
    
    
    $('.cart').click(function() {
        alert('Your Order Add to Cart');
    })
    var other = $('#other_id').data('status');

    $('#other').click(function() {
        if (other == 'hidden') {
            $('#other_id').attr('hidden', true);
            other = 'show';
        } else if (other == 'show') {
            $('#other_id').attr('hidden', false);
            other = 'hidden';
        }


    });
    var addition = $('#addition_div').data('status');

    $('#addition').click(function() {
        if (addition == 'hidden') {
            $('#addition_div').attr('hidden', true);
            addition = 'show';
        } else if (addition == 'show') {
            $('#addition_div').attr('hidden', false);
            addition = 'hidden';
        }


    });


    $('.show_sub_category_btn').click(function() {


        var subCategoryId = $(this).data('sub_category_id');
        console.log(subCategoryId);
        $.get("/api/sub-categories/" + subCategoryId + "/options", function(data) {

            var subCategoryWithOptions = data;
            $('#sub_category_name').html(subCategoryWithOptions.name);
            $('#sub_category_id').val(subCategoryWithOptions.id);
            // $('#sub_category_price').html(subCategoryWithOptions.price);

            $(subCategoryWithOptions.options).each(function(index, value) {
                $('#option_div').append('<div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="options[]" value="' + value.id + '"  checked></br> <label class="form-check-label" for="inlineCheckbox1">' + value.name + '</label>(<label class="form-check-label" for="inlineCheckbox1">' + value.price + 'MMK</label>) </div>')
            });

            $(subCategoryWithOptions.additions).each(function(index, value) {
                $('#addition_div').append('<div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="additions[]" value="' + value.id + '"  ></br> <label class="form-check-label" for="inlineCheckbox1">' + value.name + '</label>(<label class="form-check-label" for="inlineCheckbox1">' + value.price + 'MMK</label>)</div>')
            });

        });

    });
</script>

@endsection